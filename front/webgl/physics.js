//graph variables
var camera, scene, renderer;
var mesh;

//utils variable
var clock = new THREE.Clock();
var loader = new THREE.GLTFLoader();

//light variable
var ambiante;

//Physics variables
var gravityConstant = -100;
var collisionConfiguration;
var dispatcher;
var broadphase;
var solver;
var softBodySolver;
var physicsWorld;
var rigidBodies = [];
var margin = 0.05;
var transformAux1 = new Ammo.btTransform();


init();
animate();

function init() {

    initGraphics();
    
    initPhysics();

    initObjects();
}

function initGraphics() {
    camera = new THREE.PerspectiveCamera( 70, window.innerWidth / window.innerHeight, 1, 1000 );
    camera.position.z = 400;
    scene = new THREE.Scene();

    scene.background = new THREE.Color( 0x2C2C2C );
    scene.fog = new THREE.Fog( 0x010101, 0, 750 );

    ambiante = new THREE.AmbientLight( 0x404040, 15 );
    scene.add(ambiante);



    renderer = new THREE.WebGLRenderer( { antialias: true } );
    renderer.setPixelRatio( window.devicePixelRatio );
    renderer.setSize( window.innerWidth, window.innerHeight );
    document.body.appendChild( renderer.domElement );

    window.addEventListener( 'resize', onWindowResize, false );
}

function initPhysics() {

    // Physics configuration

    collisionConfiguration = new Ammo.btSoftBodyRigidBodyCollisionConfiguration();
    dispatcher = new Ammo.btCollisionDispatcher( collisionConfiguration );
    broadphase = new Ammo.btDbvtBroadphase();
    solver = new Ammo.btSequentialImpulseConstraintSolver();
    softBodySolver = new Ammo.btDefaultSoftBodySolver();
    physicsWorld = new Ammo.btSoftRigidDynamicsWorld( dispatcher, broadphase, solver, collisionConfiguration, softBodySolver );
    physicsWorld.setGravity( new Ammo.btVector3( 0, gravityConstant, 0 ) );
    physicsWorld.getWorldInfo().set_m_gravity( new Ammo.btVector3( 0, gravityConstant, 0 ) );

}

function initObjects()
{
    var quat = new THREE.Quaternion();

    // Ground
    quat.set( 0, 0, 0, 1 );

    createParalellepiped( 1400, 3000, 2, 0, new THREE.Vector3(0, 0, -100), new THREE.Quaternion(), new THREE.MeshBasicMaterial( { wireframe: true , visible: false} ));

    createParalellepiped( 1400, 3000, 2, 0, new THREE.Vector3(0, 0, 100), new THREE.Quaternion(), new THREE.MeshBasicMaterial( { wireframe: true , visible: false} ));

    createParalellepiped( 2, 3000, 200, 0, new THREE.Vector3(-700, 0, 0), new THREE.Quaternion(), new THREE.MeshBasicMaterial( { wireframe: true , visible: false} ));
    createParalellepiped( 2, 3000, 200, 0, new THREE.Vector3(700, 0, 0), new THREE.Quaternion(), new THREE.MeshBasicMaterial( { wireframe: true, visible: false } ));

    for(var i = -4; i <= 4; i++)
    {
        createParalellepiped( 2, 50, 2, 0, new THREE.Vector3(140 * i,  -200 + Math.random() * 600, 0), new THREE.Quaternion(), new THREE.MeshBasicMaterial( { wireframe: true , visible: false} ));
    
        createFood( 100, 100, 100, 100, new THREE.Vector3(120 * i, -450 + Math.random() * 1000, 0), new THREE.Quaternion(), '../model/apple/scene.gltf');
        createFood( 100, 100, 100, 100, new THREE.Vector3(120 * i, -450 + Math.random() * 1000, 0), new THREE.Quaternion(), '../model/apple/scene.gltf');
    }
}

function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize( window.innerWidth, window.innerHeight );
}

function animate() {
    requestAnimationFrame( animate );
    render();
}

function render()
{
    var deltaTime = clock.getDelta();
    updatePhysics( deltaTime );
    renderer.render( scene, camera );
}

function createParalellepiped( sx, sy, sz, mass, pos, quat, material ) {

    var threeObject = new THREE.Mesh( new THREE.BoxBufferGeometry( sx, sy, sz, 1, 1, 1 ), material );
    var shape = new Ammo.btBoxShape( new Ammo.btVector3( sx * 0.5, sy * 0.5, sz * 0.5 ) );
    shape.setMargin( margin );

    createRigidBody( threeObject, shape, mass, pos, quat );

    return threeObject;

}

function createFood( sx, sy, sz, mass, pos, quat, GLTFLink ) {

    var food;

    loader.load(GLTFLink, 
    function(gltf){

        food = gltf.scene;
        food.scale.set(20,20,20);

        var threeObject = food;
        var shape = new Ammo.btBoxShape( new Ammo.btVector3( sx * 0.5, sy * 0.5, sz * 0.5 ) );
        shape.setMargin( margin );
    
        createRigidBody( threeObject, shape, mass, pos, quat );

    },
    function(xhr){
        console.log( (xhr.loaded/xhr.total * 100) + '% loaded');
    },
    function(error){
        console.error('GLTF loading had an happened');
    });

}

function createRigidBody( threeObject, physicsShape, mass, pos, quat ) {
    threeObject.position.copy( pos );
    threeObject.quaternion.copy( quat );

    var transform = new Ammo.btTransform();
    transform.setIdentity();
    transform.setOrigin( new Ammo.btVector3( pos.x, pos.y, pos.z ) );
    transform.setRotation( new Ammo.btQuaternion( quat.x, quat.y, quat.z, quat.w ) );
    var motionState = new Ammo.btDefaultMotionState( transform );

    var localInertia = new Ammo.btVector3( 0, 0, 0 );
    physicsShape.calculateLocalInertia( mass, localInertia );

    var rbInfo = new Ammo.btRigidBodyConstructionInfo( mass, motionState, physicsShape, localInertia );
    var body = new Ammo.btRigidBody( rbInfo );

    threeObject.userData.physicsBody = body;

    //threeObject.position.set(pos.x,pos.y - 50, pos.z)

    scene.add( threeObject );
    //objects.push(threeObject);

    if ( mass > 0 ) {

        rigidBodies.push( threeObject );

        // Disable deactivation
        body.setActivationState( 4 );

    }

    physicsWorld.addRigidBody( body );

}

function updatePhysics( deltaTime ) {

    // Step world
    physicsWorld.stepSimulation( deltaTime, 10 );

    // Update rigid bodies
    for ( var i = 0, il = rigidBodies.length; i < il; i ++ ) {

        var objThree = rigidBodies[ i ];
        var objPhys = objThree.userData.physicsBody;
        var ms = objPhys.getMotionState();
        if ( ms ) {
            
            ms.getWorldTransform( transformAux1 );
            var p = transformAux1.getOrigin();
            var q = transformAux1.getRotation();
            
            if (p.y() < -500){
                var newp = new Ammo.btVector3(-650 + Math.random() * 1300, 700 ,0);
                console.log(i);
                console.log(rigidBodies[ i ]);
                //rigidBodies[ i ].position.set(0,200,0);
                objThree.position.set( newp.x(), newp.y(), newp.z() );

                transformAux1.setOrigin(newp);
                ms.setWorldTransform(transformAux1);
                objPhys.setMotionState(ms);
                
            }
            else
            {
                objThree.position.set( p.x(), p.y(), p.z() );
            }
            objThree.quaternion.set( q.x(), q.y(), q.z(), q.w() );

        }


    }
}
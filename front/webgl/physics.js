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
    var pos = new THREE.Vector3();
    var quat = new THREE.Quaternion();

    // Ground
    pos.set( 0, -100, 0 );
    quat.set( 0, 0, 0, 1 );

    createParalellepiped( 50, 50, 50, 0, pos, quat, new THREE.MeshBasicMaterial( { wireframe: true } ));

    createFood( 50, 50, 50, 0, pos, quat, '../model/apple/scene.gltf');
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
        food.scale.set(10,10,10);
        food.position.set(pos.x, pos.y-50,pos.z);

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

    console.log(threeObject);

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
            objThree.position.set( p.x(), p.y(), p.z() );
            objThree.quaternion.set( q.x(), q.y(), q.z(), q.w() );

        }
    }
}
<?php
use Slim\Http\Request; //namespace
use Slim\Http\Response; //namespace

//include jobProc.php file
include __DIR__ . '/function/jobProc.php';
include __DIR__ . '/function/compProc.php';

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

//use cors
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

//read table job_vacancy
$app->get('/jobs', function (Request $request, Response $response, array $arg)
{
    return $this->response->withJson(array('data' => 'success'), 200);

});

//read all data from table job_vacancy
$app->get('/alljobs', function (Request $request, Response $response, array $arg)

{
    $data = getAllJobs($this->db);

    if(is_null ($data))
    {
        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
    }

    return $this->response->withJson(array('data' => $data), 200);
});

//request table job_vacancy by condition (SSM)
$app->get('/jobs/[{comp_ssm}]', function ($request, $response, $args){
    $compSSM = $args['comp_ssm'];
    if (!is_numeric($compSSM)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);
    }
    $data = getJob($this->db,$compSSM);
    if (empty($data)) {
    return $this->response->withJson(array('error' => 'no data'), 500);
    }
    return $this->response->withJson(array('data' => $data), 200);

});

//request table job_vacancy by condition id
$app->get('/jobsid/[{id}]', function ($request, $response, $args){
    $jobId = $args['id'];
    if (!is_numeric($jobId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);
    }
    $data = getJobId($this->db,$jobId);
    if (empty($data)) {
    return $this->response->withJson(array('error' => 'no data'), 500);
    }
    return $this->response->withJson(array('data' => $data), 200);

});

$app->post('/jobs/add', function ($request, $response, $args) {
    $form_data = $request->getParsedBody();
    $data = createJob($this->db, $form_data);
    if ($data <= 0) {
    return $this->response->withJson(array('error' => 'add data fail'), 500);
    }
    return $this->response->withJson(array('add data' => 'success'), 200);
    }
    );

    //delete row
$app->delete('/jobs/del/[{id}]', function ($request, $response, $args){
    $jobId = $args['id'];
    if (!is_numeric($jobId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
    }
    $data = deleteJob($this->db,$jobId);
    if (empty($data)) {
    return $this->response->withJson(array($jobId=> 'is successfully deleted'), 202);};
    });
    
   //put table job_vacancy
   $app->put('/jobs/put/[{id}]', function ($request, $response, $args){
    $jobId = $args['id'];
    if (!is_numeric($jobId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
    }
    $form_dat=$request->getParsedBody();
    $data=updateJob($this->db,$form_dat,$jobId);
    if ($data <=0)
    return $this->response->withJson(array('data' => 'successfully updated'), 200);
});

//!!!!!!!!
//COMPS!!!
//!!!!!!!!

//read table comps
$app->get('/comps', function (Request $request, Response $response, array $arg)
{
    return $this->response->withJson(array('data' => 'success'), 200);

});

//read all data from table comps
$app->get('/allcomps', function (Request $request, Response $response, array $arg)

{
    $data = getAllComps($this->db);

    if(is_null ($data))
    {
        return $this->response->withHeader('Access-Control-Allow-Origin', '*')->withJson(array('error' => 'no data'), 404);
    }

    return $this->response->withJson(array('data' => $data), 200);
});

//request table comps by condition (id)
$app->get('/comps/[{id}]', function ($request, $response, $args){
    $compId = $args['id'];
    if (!is_numeric($compId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 500);
    }
    $data = getComp($this->db,$compId);
    if (empty($data)) {
    return $this->response->withJson(array('error' => 'no data'), 500);
    }
    return $this->response->withJson(array('data' => $data), 200);

});


$app->post('/comps/add', function ($request, $response, $args) {
    $form_data = $request->getParsedBody();
    $data = createComp($this->db, $form_data);
    if ($data <= 0) {
    return $this->response->withJson(array('error' => 'add data fail'), 500);
    }
    return $this->response->withJson(array('add data' => 'success'), 200);
    }
    );

       //delete comps
       $app->delete('/comps/del/[{id}]', function ($request, $response, $args){
        $compId = $args['id'];
        if (!is_numeric($compId)) {
        return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
        }
        $data = deleteComp($this->db,$compId);
        if (empty($data)) {
        return $this->response->withJson(array($compId=> 'is successfully deleted'), 202);};
        });

     //put table comps
   $app->put('/comps/put/[{id}]', function ($request, $response, $args){
    $compId = $args['id'];
    if (!is_numeric($compId)) {
    return $this->response->withJson(array('error' => 'numeric paremeter required'), 422);
    }
    $form_dat=$request->getParsedBody();
    $data=updateComp($this->db,$form_dat,$compId);
    if ($data <=0)
    return $this->response->withJson(array('data' => 'successfully updated'), 200);
});


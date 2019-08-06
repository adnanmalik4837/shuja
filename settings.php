
<?php

function github_settings_page_html(){




}
function github_register_menu_page(){
add_menu_page('GitHub Plugin','GitHub Setting','manage_options','github-setting','github_settings_page_html','dashicons-screenoptions',20);
  }
add_action('admin_menu','github_register_menu_page');


function repositories_options_page_html(){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";


 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_namee");  
if($check>0)
{

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";


 $result = $wpdb->get_results( "SELECT * FROM $table_namee");
foreach ( $result as $page )
{
  // echo $page->user_name.'<br/>';
   //echo $page->user_pass.'<br/>';
}

   ?>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <div id="log">  <h1>GitHub Repositories</h1>
  <!--  <form method="post" action="">
                User Name :<br><input type="text" id="value1"><br>
                User Pass :<br><input type="password" id="value2"><br>
            
        </form> -->

    <button id='btnRepos' class="btn btn-success">Repos</button>
     <form method="post" action="">
    <input type="submit" name="logout" value="Sign Out" class="btn btn-danger" > </form></div> 
           
    <div id='divResult' ></div>

    <script>

    	const btnRepos=document.getElementById("btnRepos")
    	//const btnCommits=document.getElementById("btnCommits")
    	const divResult=document.getElementById("divResult")
    	btnRepos.addEventListener("click",getRepos)
    	//logout.addEventListener("click",getlogout)
    	async function getRepos()
    	{clear();
        var u_name = "<?php echo $page->user_name; ?>";
    		var u_pass = "<?php echo $page->user_pass; ?>";
     
    		  const username=u_name; 
 const password= u_pass; 
if(username=='') {
         alert('Please Enter User Name');
           
        }
        	if(password=='') {
         alert('Please Enter Password');
           
        }
    		    const headers={
     	"Authorization" : `Basic ${btoa(`${username}:${password}`)}`
     }

        const url="https://api.github.com/user/repos"
 
     const reponse=await fetch(url,{
        "method": "GET",
      	"headers": headers
      })
      const result=await reponse.json()

      result.forEach(i=>{
      	const anchor=document.createElement("a")
      anchor.href=i.html_url;
        //anchor.href=i.commits_url; 
    anchor.textContent=i.full_name;
    
	divResult.appendChild(anchor)
	 divResult.appendChild(document.createElement("br"))
       })


    	}
    	
   
    	function clear()
    	{
    		while(divResult.firstChild)
    			divResult.removeChild(divResult.firstChild)
    	}
    </script><?php

   if(isset($_POST['logout'])){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");


?>
<script>
   var x = document.getElementById("log");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="col-lg-5">
  
  <div class="panel panel-default">
    <div class="panel panel-success">
    <div class="panel-heading"><center><h2>GITHUB REPOSITORIES</h2></center></div></div>
<div class="panel-body">

     <form method="post" action="" class="form-horizontal" >
      <div class="row">

     <div class="col-xs-12">
     <div class="input-group"> 
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
               <input type="text"  name="value1" class="form-control" size="30px" placeholder="User Name">

             </div><br></div></div>
                   
                      <div class="row">
                   <div class="col-xs-12">  
                   <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
               <input type="password" class="form-control"  placeholder="Password" name="value2"></div></div></div><br>
                
<center><button id='login' class="btn btn-success">LOGIN</button></center> </form>
 </div>
  </div>
    </div>

    <script>
 
var x = document.getElementById("repos");
      const loginn=document.getElementById("login")
      loginn.addEventListener("click",getlogin)
       function getlogin()
      {
      <?php
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_name = $wpdb->prefix . "gh_temp_table";
  $value1=$_POST['value1'];
        $value2=$_POST['value2'];
 if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

   if($value2=='') {
            echo "<script>alert('Please Enter Email')</script>";
            exit();
        }
$wpdb->insert( 
  ''.$table_name.'', 
  array( 
    'user_name' => $value1,  
    'user_pass' =>  $value2
  ), 
  array( '%s',
                '%s'
  ) 
);

?>

     }

    </script>
<?php  }



}
else
{
?>
<div id="sif">



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="col-lg-5">
  
  <div class="panel panel-default">
    <div class="panel panel-success">
    <div class="panel-heading"><center><h2>GITHUB REPOSITORIES</h2></center></div></div>
<div class="panel-body">

     <form method="post" action="" class="form-horizontal" >
      <div class="row">

     <div class="col-xs-12">
     <div class="input-group"> 
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
               <input type="text"  name="value1" class="form-control" size="30px" placeholder="User Name">

             </div><br></div></div>
                   
                      <div class="row">
                   <div class="col-xs-12">  
                   <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
               <input type="password" class="form-control"  placeholder="Password" name="value2"></div></div></div><br>
                
<center><button id='login' class="btn btn-success">LOGIN</button></center> </form>
 </div>
  </div>
    </div>


 </div>
    

    <script>
         var x = document.getElementById("sif");
  if (x.style.display === "none") {
    x.style.display = "block";
   
  } else {
    x.style.display = "none";
 
     alert("Refresh Once");
  }
   
var x = document.getElementById("repos");
    	const loginn=document.getElementById("login")
    	loginn.addEventListener("click",getlogin)
    	 function getlogin()
    	{

      <?php
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_name = $wpdb->prefix . "gh_temp_table";
  $value1=$_POST['value1'];
        $value2=$_POST['value2'];
 if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

   if($value2=='') {
            echo "<script>alert('Please Enter Email')</script>";
            exit();
        }
$wpdb->insert( 
  ''.$table_name.'', 
  array( 
    'user_name' => $value1,  
    'user_pass' =>  $value2
  ), 
  array( '%s',
                '%s'
  ) 
);

?>
 
     }

    </script><?php
  
}




}
function repositories_menu_page(){
add_submenu_page('github-setting',
        'Repositories',
        'Repositories',
        'manage_options',
        'repositories-sd',
        'repositories_options_page_html',20);
  }
add_action('admin_menu','repositories_menu_page');


function Commits_options_page_html(){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";


 $check = $wpdb->get_var( "SELECT COUNT(*) FROM $table_namee");  
if($check>0)
{

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_namee = $wpdb->prefix . "gh_temp_table";


 $result = $wpdb->get_results( "SELECT * FROM $table_namee");
foreach ( $result as $page )
{
  // echo $page->user_name.'<br/>';
   //echo $page->user_pass.'<br/>';
}

   ?>
  <div id="log">  <h1>GitHub Commits</h1>
   <form method="post" action=""> 
                
               Repositorie Name :<br><input type="text" id="value3"><br>
              Author Name :<br><input type="text" id="value4"><br>
         
 </form>
        <button id='btnCommits'>Commits</button> 

     <form method="post" action="">

    <input type="submit" name="logout" value="Sign Out" > </form></div> 
           
    <div id='divResult' ></div>

    <script>

      const btnCommits=document.getElementById("btnCommits")
      //const btnCommits=document.getElementById("btnCommits")
      const divResult=document.getElementById("divResult")
      btnCommits.addEventListener("click",getCommits)
      //logout.addEventListener("click",getlogout)
  async function getCommits()
      {clear();
      var u_name = "<?php echo $page->user_name; ?>";
        var u_pass = "<?php echo $page->user_pass; ?>";
     
          const username=u_name; 
 const password= u_pass; 
            const repositorie=document.getElementById("value3").value; 
            const author=document.getElementById("value4").value;  
      if(username=='') {
         alert('Please Enter User Name');
           
        }
          if(password=='') {
         alert('Please Enter Password');
           
        }
          if(repositorie=='') {
         alert('Please Enter Repositories');
           
        }
          if(author=='') {
         alert('Please Enter Author');
           
        }

      const headers={
      "Accept" : "application/vnd.github.cloak-preview"
     }

        const url="http://api.github.com/search/commits?q=repo:"+username+"/"+repositorie+" author-name:"+author+""
    
     const reponse=await fetch(url,{
        "method": "GET",
        "headers": headers
      })
      const result=await reponse.json()

      result.items.forEach(i=>{
        const auhorname=document.createElement("auhorname")
        const img=document.createElement("img")
        auhorname.textContent=i.author.login;
        img.src=i.author.avatar_url;
        img.style.width="32px"
        img.style.height="32px"
        const anchor=document.createElement("a")
     anchor.href=i.html_url;
     anchor.textContent=i.commit.message; 
     divResult.appendChild(document.createElement("br"))  
     divResult.appendChild(img)
     divResult.appendChild(document.createElement("br"))
     divResult.appendChild(auhorname)
     divResult.appendChild(document.createElement("br"))
        divResult.appendChild(anchor)
  divResult.appendChild(document.createElement("br"))
      })
         
   }
      function clear()
      {
        while(divResult.firstChild)
          divResult.removeChild(divResult.firstChild)
      }
    </script><?php

   if(isset($_POST['logout'])){
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_na = $wpdb->prefix . "gh_temp_table";
$delete = $wpdb->query("TRUNCATE TABLE $table_na");


?>
<script>
   var x = document.getElementById("log");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

</script>
<!-- <h1>GitHub Commits</h1>
     <form method="post" action="">
                User Name :<br><input type="text"  name="value1"><br>
                User Pass :<br><input type="password" name="value2"><br>
              
   <button id='login'>login</button>   </form>
    
 -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="col-lg-5">
  
  <div class="panel panel-default">
    <div class="panel panel-success">
    <div class="panel-heading"><center><h2>GITHUB COMMITS</h2></center></div></div>
<div class="panel-body">

     <form method="post" action="" class="form-horizontal" >
      <div class="row">

     <div class="col-xs-12">
     <div class="input-group"> 
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
               <input type="text"  name="value1" class="form-control" size="30px" placeholder="User Name">

             </div><br></div></div>
                   
                      <div class="row">
                   <div class="col-xs-12">  
                   <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
               <input type="password" class="form-control"  placeholder="Password" name="value2"></div></div></div><br>
                
<center><button id='login' class="btn btn-success">LOGIN</button></center> </form>
 </div>
  </div>
    </div>

    <script>
 
var x = document.getElementById("repos");
      const loginn=document.getElementById("login")
      loginn.addEventListener("click",getlogin)
       function getlogin()
      {
      <?php
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_name = $wpdb->prefix . "gh_temp_table";
  $value1=$_POST['value1'];
        $value2=$_POST['value2'];
 if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

   if($value2=='') {
            echo "<script>alert('Please Enter Email')</script>";
            exit();
        }
$wpdb->insert( 
  ''.$table_name.'', 
  array( 
    'user_name' => $value1,  
    'user_pass' =>  $value2
  ), 
  array( '%s',
                '%s'
  ) 
);

?>

     }

    </script>
<?php  }



}
else
{
?>
<div id="sif"><h1>GitHub Repositories</h1>
     <form method="post" action="">
                User Name :<br><input type="text"  name="value1"><br>
                User Pass :<br><input type="password" name="value2"><br>
                
              
   <button id='login'>login</button></form> </div>
    

    <script>
         var x = document.getElementById("sif");
  if (x.style.display === "none") {
    x.style.display = "block";
   
  } else {
    x.style.display = "none";
 
     alert("Refresh Once");
  }
   
var x = document.getElementById("repos");
      const loginn=document.getElementById("login")
      loginn.addEventListener("click",getlogin)
       function getlogin()
      {

      <?php
global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$table_name = $wpdb->prefix . "gh_temp_table";
  $value1=$_POST['value1'];
        $value2=$_POST['value2'];
 if($value1=='') {
            echo "<script>alert('Please Enter User Name')</script>";
            exit();
        }

   if($value2=='') {
            echo "<script>alert('Please Enter Email')</script>";
            exit();
        }
$wpdb->insert( 
  ''.$table_name.'', 
  array( 
    'user_name' => $value1,  
    'user_pass' =>  $value2
  ), 
  array( '%s',
                '%s'
  ) 
);

?>
 
     }

    </script><?php
  
}



}

function Commits_menu_page(){
add_submenu_page('github-setting',
        'Commits',
        'Commits',
        'manage_options',
        'Commits-sd',
        'Commits_options_page_html',20);
  }
add_action('admin_menu','Commits_menu_page');

function github_plugin_setting(){
register_setting('github-setting','user_label');
register_setting('github-setting','pass_label');
add_settings_section('github_label_section','Sign In From','github_plugin_setting_section_cb','github-setting');
add_settings_field('user_label_field','User Name : ','user_label_field_cb','github-setting','github_label_section');
add_settings_field('pass_label_field','Password : ','pass_label_field_cb','github-setting','github_label_section');

}
add_action('admin_init','github_plugin_setting');
function github_plugin_setting_section_cb(){
}

function user_label_field_cb(){
 
} 
function pass_label_field_cb(){

} 


?>

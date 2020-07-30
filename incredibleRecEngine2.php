<?php # -*- coding: utf-8 -*-
/* Plugin Name: incredibleRecEngine2 */
putenv('PYTHONPATH=/usr/lib64/python2.7/site-packages');


add_shortcode( 'execute_python', 'execute_python_with_argv' );

function execute_python_with_argv( $attributes ){
?>  
       <div class='wrap'>  
        <h2>custom form</h2>  
        <div class="main-content">  
  
        <!-- You only need this form and the form-basic.css -->  
  
        <form class="form-basic" method="post" action="#">  
  
            <div class="form-title-row">  
                <h1>Form Example</h1>  
            </div>  
  
            <div class="form-row">  
                <label>  
                    <span>Select your area</span>  
                    <select name="area">  
                        <option>L’Île-Bizard—Sainte-Geneviève</option>  
                        <option>Pierrefonds-Roxboro</option>  
                        <option>Saint-Laurent</option> 
                        <option>Ahuntsic-Cartierville</option> 
                        <option>Montréal-Nord</option>
                        <option>Rivière-des-Prairies—Pointe-aux-Trembles</option> 
                        <option>Anjou</option> 
                        <option>Saint-Léonard</option> 
                        <option>Villeray—Saint-Michel—Parc-Extension</option> 
                        <option>Rosemont—La Petite-Patrie</option> 
                        <option>Mercier—Hochelaga-Maisonneuve</option> 
                        <option>Le Plateau-Mont-Royal</option> 
                        <option>Outremont</option> 
                        <option>Ville-Marie</option> 
                        <option>Côte-des-Neiges—Notre-Dame-de-Grâce</option> 
                        <option>Le Sud-Ouest</option> 
                        <option>Verdun</option> 
                        <option>LaSalle</option>   
                    </select>  
                </label>  
            </div>  
  
            <div class="form-row">  
                <label>  
                    <span>Select your prefered service size</span>  
                    <select name="service">  
                        <option>small</option>  
                        <option>medium</option>  
                        <option>large</option>  
                    </select>  
                </label>  
            </div>   
  
            <div class="form-row">  
                <label>  
                    <span>Select your prefered organization size</span>  
                    <select name="org">  
                        <option>small</option>  
                        <option>medium</option>  
                        <option>large</option>  
                    </select>  
                </label>  
            </div>  
  
            <div class="form-row">  
                <label>  
                    <span>Select your prefered role</span>  
                    <select name="role">  
                        <option>cook</option>  
                        <option>serve</option>  
                        <option>prep</option>  
                        <option>clean</option>  
                    </select>  
                </label>  
            </div>  
  
            <div class="form-row">  
                <button type="submit">Submit Form</button>  
            </div>  
  
        </form>  
  
        </div>  
          
        </div>  
       <?php  
$description = array (     
    0 => array("pipe", "r"),  // stdin
    1 => array("pipe", "w"),  // stdout
    2 => array("pipe", "w")   // stderr
);

$application_system = "python ";
$application_path .= plugin_dir_path( __FILE__ );
$application_name .= "hello.py";
$separator = " ";
$separator2 = "!";

$application = $application_system.$application_path.$application_name.$separator;

$argv1 = $_POST['area'].$separator2.$_POST['service'].$separator2.$_POST['org'].$separator2.$_POST['role'];
$pipes = array();

$proc = proc_open ( $application.$argv1 , $description , $pipes );

//echo proc_get_status($proc)['pid'];

if (is_resource ( $proc ))
{
    echo "Stdout : " . stream_get_contents ( $pipes [1] ); //Reading stdout buffer
    fclose ( $pipes [1] ); //Closing stdout buffer
    fclose ( $pipes [2] ); //Closing stderr buffer

    $return_value = proc_close($proc);
    echo "<br/>command returned: $return_value<br/>";
}

$application_test = glitch_player_DIR.$application_name;

//echo "<br/>Is ".$application_test." executable? ".is_executable($application_test)." ";
//echo "readable? ".is_readable($application_test)." ";
//echo "writable? ".is_writable($application_test)." ";

}  //EOF main/shortcode function

?>
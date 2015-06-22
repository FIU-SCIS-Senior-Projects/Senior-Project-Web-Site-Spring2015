<!DOCTYPE html>



<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
	
        <meta charset="UTF-8">
        <title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">


		<script>
		
					
		$(document).ready(function()
		{
		/* $('span').on('click', function () {
    alert(this.id);
});*/ 
		
		 
		$('#studentPop').click(function()
				{
				
				//alert("The index is "+$(this).next().index());
				
				//	$('.pd3').children("#popover").toggle();
					//return $(this).next("#popover").toggle();
				/**/	$("#popover").toggle();
					$("#popover2").toggle();
					$("#umsi").toggleClass("hidden");
					$("#umss").toggleClass("hidden");
					
					
				
				});/**/
		 
		 
		/*$('.ums').hide();
		
		$('.showums').click(function() {
			 $('.ums').toggle();})
			 */

			 $( "div.pd3" ).hover(
			function() {
			$( this ).addClass( "sel" );
			}, function() {
			$( this ).removeClass( "sel" );
				});
				/**/
				 $( "div.pd" ).hover(
			function() {
			$( this ).addClass( "sel" );
			}, function() {
			$( this ).removeClass( "sel" );
				});
				
					 $( "div.pd2" ).hover(
			function() {
			$( this ).addClass( "sel" );
			}, function() {
			$( this ).removeClass( "sel" );
				});
				
				
				//When student name is clicked, toggle buttons
				
				
				
				
				//popover 1
				$('[data-toggle="popover"]').popover({
				trigger: 'click',
				html:true,  
				content: function() {
    return $(this).next("#umss").html();
}
			});
			//popover 3 -skills in 
				$('[data-toggle="popover3"]').popover({
				trigger: 'click',
				html:true,  
				content: function() {
				return $(this).next("#umsi").html();
}
			});
			/*$('[data-toggle="popover2"]').popover({
				trigger: 'click',
				html:true, 
				content: function()
				{
					return $(this).next(".filled_stats").html();
				}
			});*/
			
			$('[data-toggle="popover2"]').popover({
				trigger: 'click',
				html:true, 
				content: function()
				{
					return $(this).next(".studentData").html();
				}
			});
				
				//$("#draggable").draggable();
			
		});
	
		</script>
    </head>
    <body>
        
        <style>
		#test
		{	
			display: none;
		}
		.popover-title {
		color: blue;
		
		}
		
		#test
		{
			height: auto;
			width:300px;
			background-color: yellow;
			
		}
		
		.popover-content {
		background-color: #FFF5EE;
		border: black solid 4px;
		border-radius: 10px;
		}
		
            td{
                border: 1px solid black;
                vertical-align: top;
                text-align: center;
            }
            #on-hover{
                display: none;
            }
            #overflow:hover #on-hover{
                display: block;
            }
            table{
                table-layout: fixed;
            }
            div.studentData{
                display: none;
            }
			
			div.filled_stats{
                display: none;
            }
									
				.Button{
					margin:5px;
			}
			div.pd{
			background-color: #FFB6C1;
			cursor: pointer;
			margin: 1%;
			}
			
			div.pd2{
			background-color: #ADD8E6;
			cursor: pointer;
			margin: 1%;
			}
			
			div.pd3{
			 display: inline-block;
			background-color: #E6E6FA;
			cursor: pointer;
			margin: 1%;
			width:300px;
			height:auto;
			}
			#target{
			height: 120px;
			width: 120px;
			
			}
			
			.sel{
			border: black solid 2px;
			}
			.hidden>div {
    display:none;
}
.studinfo{
		display: none;
	}
	
					
        </style>
        <script>
		
		/* function showStudFunction(obj){
                    
                    if($("div[class*=studinfo][id="+ $(obj).attr("id") +"]").css("display") != "none"){
                        $("div[class*=studinfo][id="+ $(obj).attr("id") +"]").css("display","none");
						
						
                    }
                    else{
                        $("div[class*=studinfo][id="+ $(obj).attr("id") +"]").css("display","block");
                    }
                };
				*/
		
		  function regionalUMStudFunction(obj){
                    
                    if($("div[class*=studentData][id="+ $(obj).attr("id") +"]").css("display") != "none"){
                        $("div[class*=studentData][id="+ $(obj).attr("id") +"]").css("display","none");
                    }
                    else{
                        $("div[class*=studentData][id="+ $(obj).attr("id") +"]").css("display","block");
                    }
                };
		
                        
                function regionalStudFunction(obj){
                    
                    if($("div[class*=studentData][id="+ $(obj).attr("id") +"]").css("display") != "none"){
                        $("div[class*=studentData][id="+ $(obj).attr("id") +"]").css("display","none");
                    }
                    else{
                        $("div[class*=studentData][id="+ $(obj).attr("id") +"]").css("display","block");
                    }
                };
                
                function globalStudFunction(){
                    
                    if($("div[class*=studentData]").css("display") != "none"){
                        $("div[class*=studentData]").css("display","none");
                    }
                    else{
                        $("div[class*=studentData]").css("display","block");
                    }
                };
          
        </script>


        <?php $this->load->view("matchmaking_header");
       ?>
     <!--Note: "warning" to make red; "success" for green-->
     <h1>Match Results</h1>
     <h6>Below is the final match configuration for all projects please confirm to send to database.</h6>
     Note: When applicable green means the skill is fulfilled. Orange unfulfilled. Gray unnecessary (hover to reveal).
                  <?php
            echo form_open('match/saveMatchings');?>
     <button type="button" id="s" class="globalStud" onclick="globalStudFunction()">Show/Hide All Students</button><br>
     <table style="width: 1000px">
    <tr>
        <td> <h2>VIP Matching Final Details</h2>
            <b>Overall Match Data</b><br>
        Student Average Interest: <?php echo $VIPfinalMD->avgInterest;?><br>
        Average Total Skill Fulfillment: <?php echo $VIPfinalMD->avgTotalSkill;?>%<br>
        Student Average Fulfillment <?php echo $VIPfinalMD->avgAvgFulfillment;?>%<br>
        Total Overflow Skills: <?php echo $VIPfinalMD->totalOverflow;?></td>
    </tr>
	
       
     
     </table><br><br><br>
     
<table style="width: 1000px">
    <tr>
        <td> <h2>Other Projects Final Details</h2>
            <b>Overall Match Data</b><br>
        Student Average Interest: <?php echo $OtherMD->avgInterest;?><br>
        Average Total Skill Fulfillment: <?php echo $OtherMD->avgTotalSkill;?>%<br>
        Student Average Fulfillment <?php echo $OtherMD->avgAvgFulfillment;?>%<br>
        Total Overflow Skills: <?php echo $OtherMD->totalOverflow;?></td>
    </tr>
        <?php
        //$PLc = array_values($_SESSION['VIPs']);
        $OtherP = array_values($OtherP);
        for($i = 0; $i<count($OtherP); $i++){
            echo '<tr>';
            echo '<td>';
            echo '<h3>';
            echo $OtherP[$i]->name;
            echo '</h3>';
            echo '';
            echo '<b>Student Interest Average: </b>';
            echo $OtherP[$i]->calculateAvgInterest();
            echo '<br>';
            echo '<b>Skill Total Fulfillment: </b>';
            echo $OtherP[$i]->calculateTotalFulfillment();
            echo '%<br>';
            echo '<b>Student Average Fulfillment: </b>';
            echo $OtherP[$i]->calculateAvgFulfillment();
            echo '%<br>';
            echo '<b>Student Total Overflow Skills:</b>';
            echo $OtherP[$i]->calculateTotalOverflow();
            echo '<br>';
            echo '<b>Skill Fulfillment Data:</b><br>';
            foreach ($OtherP[$i]->fulfilledSkills as $s) {
                echo '<li class="label label-success skill">';
                echo $s;
                echo '</li>';
                echo ' ';
            }    
            foreach ($OtherP[$i]->missingSkills as $s) {
                echo '<li class="label label-warning skill">';
                echo $s;
                echo '</li>';
                echo ' ';
            }

            echo '<br><h5>Students Added:(';
            echo count($OtherP[$i]->desiredStudents);
            echo ' out of ';
            echo $OtherP[$i]->max;
            echo ')   <button type="button" id="s'.$i .'" class="regionalStud" onclick="regionalStudFunction(this)">Show/Hide Students</button></h5>';
            echo '<div id="s'.$i.'" class="studentData">';
            foreach($OtherP[$i]->desiredStudents as $s){
                echo '<h6>';
                echo $s->name;
                echo '</h6>';
                echo 'Interest: ';
                echo $s->scoreList[$OtherP[$i]->id];
                echo '<br>';
                echo '% of Project Skills Acheived: ';
                echo $OtherP[$i]->figureSkillContribution($s);
                echo '%<br>';
                echo 'Amount of overflow skills: ';
                echo count($s->overflowSkills);
                echo '<br>';
                echo 'Skill contribution:';
                echo '<br>';

                if(count($s->fufilledSkills)>0){
                    foreach ($s->fufilledSkills as $skill) {
                       echo '<li class="label label-success skill">';
                       echo $skill;
                       echo '</li>';
                       echo ' ';
                   }
                   foreach ($s->missingSkills as $skill) {
                       echo '<li class="label label-warning skill">';
                       echo $skill;
                       echo '</li>';
                       echo ' ';
                    }
               }
               else{
                   echo '<i>No Contribution</i><br>';
               }
               if(count($s->overflowSkills)>0){
                echo '<div id="overflow">';
                echo '<li class="label skill">Hover to reveal overflow skill</li>';
                echo '<div id="on-hover">';  
               }

               foreach ($s->overflowSkills as $skill) {
                   echo '<li class="label skill">';
                   echo $skill;
                   echo '</li>';
                   echo ' ';
               } 
               if(count($s->overflowSkills)>0){
               echo '</div>';
               echo '</div>';
               }

               echo '<br>';
            }
            echo '</div>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
		
		<?php
		
			
			echo "<div id = 'test'>";
			echo "Test</br>";
			
			
			$unUsed_skills = array();//An array to hold all the skills of the still unmatched students.
			$assigned_skills = array();//An array to hold all the skills of the students already assigned.
			
			$missing_unfilled = array();//An array to hold the missing skills in unfilled projects
			$missing_filled = array();//An array to hold the missing skills in filled projects
			$needed_skills = array();
			$filled_skills =array();
			//fill the $missing_unfilled with missing skills not filled.
			
			for($i = 0; $i<count($VIPfinal); $i++){
				
					if(count($VIPfinal[$i]->desiredStudents)!=$VIPfinal[$i]->max)
					{
						foreach ($VIPfinal[$i]->missingSkills as $s) {
						if(!in_array($s,$needed_skills))
							array_push($needed_skills, $s);
						}
					}
					else
					{
						foreach ($VIPfinal[$i]->missingSkills as $s) {
						if(!in_array($s,$filled_skills))
							array_push($filled_skills, $s);
						}
				
					}
			}
			
			
			//print the total # of skills missing
			echo "There are <b>".count($filled_skills)."</b> skills needed. </br>";
			//print needed skills
			foreach($filled_skills as $n)
			{
				echo $n."<br>";
			}
					
			
			echo "<br>";
			//create array for unmatched student skills.
			foreach($unmatched as $u)
			{
				
				for($i=0; $i<count($u->skills);$i++)
				{
					if(!in_array($u->skills[$i],$unUsed_skills))
					array_push($unUsed_skills, $u->skills[$i]);
				}
			}
		/**/	
			//create array for students that are already 
			
			
			//print_r($VIPfinal);
			
			
			
			
				foreach($VIPfinal as $p)
				{
					foreach($p->desiredStudents as $ps)
					{
						/*echo "<b>" .$ps->name.":</b></br>";
						/*foreach($ps->skills as $s)
						{
							echo $s.", ";
							
							
						}*/
					
					for($i=0;$i<count($ps->skills);$i++)
						{
							//echo $ps->skills[$i];
							if(!in_array($ps->skills[$i],$assigned_skills))
							{
								array_push($assigned_skills, $ps->skills[$i]);
							}
							
							//echo "<br>";
							
						}
					}
				
					/*echo"</br></br>";*/
				} 
			/*echo "<hr>";
			echo "There are " .count($assigned_skills)." assigned skills<br>";
			
			foreach($assigned_skills as $as)
			{
				echo $as."<br>";
			}
			echo "<br><br>";
			echo "<hr>";
			echo "There are".count($unUsed_skills)." <b>unUsed skills</b><br>";
			foreach($unUsed_skills as $us)
			{
				echo $us."<br>";
			}
			*/
			
		/*	foreach($unmatched as $u)
			{
				
				for($i=0; $i<count($u->skills);$i++)
				array_push($unUsed_skills, $u->skills[$i]);
				
			}*/
			//print_r($unUsed_skills);
			/*echo "There are ". count($unUsed_skills)." unused skills<br><br>";
			foreach($unUsed_skills as $us)
			{
				echo $us."<br>";
			}
			*/
		/*	
			foreach($unmatched as $u)
			{
				echo $u->name."<br>";
				echo count($u->skills)."<br>";
				//print_r($u->skills);
				for($i=0; $i<count($u->skills);$i++)
				{
					echo $u->skills[$i]."<br>";
				}
				echo"<br><br>";
				
			}
		*/	
			echo"</div>";
		
		
		?>
		
</table><br>   
<table style="width: 1000px">
<tr>
	<td>
			<h3>Unmatched Students </h3>
						<?php
						if(count($unmatched) == 0){
							echo 'All students matched!';
						}
						else{
						/**/echo "<h5>".count($unmatched)." Students still not matched</h5>";
						
							for($i = 0; $i<count($unmatched); $i++)
							// foreach($unmatched as $s)
							{
							
								echo "<div class = 'pd3'>";
								echo   '<button type="button" id="s'.$i.'" class="regionalStud btn  btn-info btn-lg pull-left" onclick="showStudFunction(this)">'.$unmatched[$i]->name.'</button></h5>';
								
								//Not needed for now
								/*echo '<span  id = "studentPop"'.$i.' class= "btn  btn-info btn-lg pull-left"
										data-toggle="popover3" data-placement="left">
										'.$unmatched[$i]->name.'
										</span>';*/
								//echo '<div class="studinfo" id="ums'.$i.'>';
								
								//echo '<h5>';
								//echo $unmatched[$i]->name;
								
								//echo $s->name;
								//echo '</h5>';
								//echo "id no.: ".$unmatched[$i]->id."</br>";
								//echo "<h6>Skills:</h6>";
								//button starts below
								//To avoid the jumping, replaced the anchor tag with a span instead
								//echo '<span id = "popover" 
										
								//		title="Information for '.$unmatched[$i]->name.'"class= "btn  btn-danger btn-lg pull-left"
								//		data-toggle="popover" data-placement="right">
								//		'.$unmatched[$i]->name.'
								//		</span>';
								echo '<span id = "popover"'.$i.' 
										
										title="Information for '.$unmatched[$i]->name.'"class= "btn  btn-danger btn-lg pull-right"
										data-toggle="popover" data-placement="right">
										Skills
										</span>';
								echo " ";
									echo '<span id = "popover2"'.$i.' 
										
										title="Information for '.$unmatched[$i]->name.'"class= "btn  btn-danger btn-lg pull-right"
										data-toggle="popover3" data-placement="left">
										Interests
										</span>';
								/*Comment out umss idv*/
								//echo '<div id="umss"'.$i.' class ="hidden">';
								
								//skills
								//echo "I am of class ".$i;
								echo "<h6>Skills for".$unmatched[$i]->name."</h6>";
								for($n=0; $n<count($unmatched[$i]->skills);$n++)
								{
								/*
									if(!in_array($unmatched[$i]->skills[$n],$unUsed_skills))
									{
										array_push($unUsed_skills, $unmatched[$i]->skills[$n]);
									}
								*/
								if(in_array($unmatched[$i]->skills[$n],$needed_skills))
								{
								
								
									echo '<li class="label label-success skill">';
									echo $s;
									echo '</li>';
									echo ' ';
								}
								else if(in_array($unmatched[$i]->skills[$n],$filled_skills)){
										echo '<li class="label label-warning skill">';
										echo $unmatched[$i]->skills[$n]."</br>";
										
										echo '</li>';
										echo ' ';/**/
									}
									else{
									echo '<li class="label label skill">';
										echo $unmatched[$i]->skills[$n]."</br>";
										
										echo '</li>';
										echo ' ';/**/
									}
								}
								//echo "</div>";
								$cnt = 0;
								//echo '<h6>Interest: </h6>';
								//echo "<div id='spacer'></div>";
								//echo '<button type="button" id="s'.$i .'" class="regionalStud"   onclick="regionalStudFunction(this)"> Interests </button>';
								/*comment out umss div*/
								//echo"</div>";
								
							
										/*comment out umsi div*/
							//	echo '<div id="umsi"'.$i.' class ="hidden">';
								echo "<h6>Interests for".$unmatched[$i]->name." [Student score in brackets]</h6>";
								foreach($unmatched[$i]->iProjList as $m)
								{
									if ($m->studScore>-1)
									{
										echo $m->name." [".$m->studScore."]</br>";
										$cnt++;
									}
								}
								
								if($cnt==0)
								echo "Student has no preference.";
								echo "</div>";
								//echo count($s->$skills);
								/*Comment out umsi div*/
								//echo '</div>';
								echo '<br>';
								echo "</div>";
								//echo "<br><br>";
								
							}
							//echo "<div class ='spacer'></div>";
							
							//echo $unmatched[0]->name." by Index";
							//print_r($unmatched);
							//echo "Not by index";
							
						}?>
			
	
	</td>
	
             <td>  
			 <h3>Projects Not Filled </h3>

<?php

		//find out how many projects still need students.
		$unfilled =0;
		for($i = 0; $i<count($VIPfinal); $i++){
		
			if(count($VIPfinal[$i]->desiredStudents)!=$VIPfinal[$i]->max){
			$unfilled++;
			}
		}
		if($unfilled == 0){
							echo 'All Projects filled!';
						}
						else{
		echo "<h5>". $unfilled." projects still need students</h5>";
		}
		
        //$PLc = array_values($_SESSION['VIPs']);
        
        for($i = 0; $i<count($VIPfinal); $i++){
		
		if(count($VIPfinal[$i]->desiredStudents)!=$VIPfinal[$i]->max){
            /* echo '<tr>';
            echo '<td>';*/
			
			echo '<div class ="pd">';
			echo 'at intdex:'.$i.'</br>';
			echo '<button type="button" id="s'.$i.'" class="regionalStud btn btn-lg btn-info" onclick="regionalStudFunction(this)">'.$VIPfinal[$i]->name.'</button></h5>';
           // echo '<h3>';
           // echo $VIPfinal[$i]->name;
           // echo '</h3>';
			
			/*echo '<button type="button" id="s'.$i .'" class="regionalStud btn btn-primary btn-small  Button" onclick="regionalStudFunction(this)">Students and Project Information</button></br>';*/
			echo '';
			//Not needed for now.
			//replaced anchor tag with a span to avoid jumping to the top of the page when clicked.
			/*echo '<span id = "pop" 
				
				title="Project information"
				class= "btn btn-lg btn-info"
				data-toggle="popover2">
				'.$VIPfinal[$i]->name.'
				</span>';
				*/
			echo" </br>";
			
			echo '<span id = "pop" 
				
				title="Project information"
				class= "btn btn-lg btn-danger"
				data-toggle="popover2">
				Project Stats
				</span>';
			echo " ";
			echo '<span id = "pop" 
				
				title="Project information"
				class= "btn btn-lg btn-danger"
				data-toggle="popover2">
				Project Skills
				</span>';
				echo " ";
				echo '<span id = "pop" 
				
				title="Project information"
				class= "btn btn-lg btn-danger"
				data-toggle="popover2">
				Students
				</span>';
				echo '<div id="s'.$i.'" class="studentData">';
			
			echo '</br>';
            echo "<b>Head Professor's Rating: </b>".$VIPfinal[$i]->score."<br>";
            echo '<b>Student Interest Average: </b>';
            echo $VIPfinal[$i]->calculateAvgInterest();
            echo '<br>';
            echo '<b>Skill Total Fulfillment: </b>';
            echo $VIPfinal[$i]->calculateTotalFulfillment();
            echo '%<br>';
            echo '<b>Student Average Fulfillment: </b>';
            echo $VIPfinal[$i]->calculateAvgFulfillment();
            echo '%<br>';
            echo '<b>Student Total Overflow Skills:</b>';
            echo $VIPfinal[$i]->calculateTotalOverflow();
            echo '<br>';
            echo '<b>Skill Fulfillment Data:</b><br>';
            foreach ($VIPfinal[$i]->fulfilledSkills as $s) {
                echo '<li class="label label-success skill">';
                echo $s;
                echo '</li>';
                echo ' ';
            }    
            foreach ($VIPfinal[$i]->missingSkills as $s) {
                echo '<li class="label label-warning skill">';
                echo $s;
                echo '</li>';
                echo ' ';
            }

            echo '<br><h5>Students Added:(';
            echo count($VIPfinal[$i]->desiredStudents);
            echo ' out of ';
            echo $VIPfinal[$i]->max;
            echo ')   </h5>';
            
            foreach($VIPfinal[$i]->desiredStudents as $s){
                echo '<h6>';
                echo $s->name;
                echo '</h6>';
                echo 'Interest: ';
                echo $s->scoreList[$VIPfinal[$i]->id];
                echo '<br>';
                echo '% of Project Skills Acheived: ';
                echo $VIPfinal[$i]->figureSkillContribution($s);
                echo '%<br>';
                echo 'Amount of overflow skills: ';
                echo count($s->overflowSkills);
                echo '<br>';
                echo 'Skill contribution:';
                echo '<br>';

                if(count($s->fufilledSkills)>0){
                    foreach ($s->fufilledSkills as $skill) {
                       echo '<li class="label label-success skill">';
                       echo $skill;
                       echo '</li>';
                       echo ' ';
                   }
                   foreach ($s->missingSkills as $skill) {
                       echo '<li class="label label-warning skill">';
                       echo $skill;
                       echo '</li>';
                       echo ' ';
                    }
               }
               else{
                   echo '<i>No Contribution</i><br>';
               }
               if(count($s->overflowSkills)>0){
                echo '<div id="overflow">';
                echo '<li class="label skill">Hover to reveal overflow skill</li>';
                echo '<div id="on-hover">';  
               }

               foreach ($s->overflowSkills as $skill) {
                   echo '<li class="label skill">';
                   echo $skill;
                   echo '</li>';
                   echo ' ';
               } 
               if(count($s->overflowSkills)>0){
               echo '</div>';
               echo '</div>';
               }

               echo '<br>';
            }
            echo '</div>';
           /*echo '</td>';
             echo '</tr>';*/
			echo '</div>';
			 }
        }
		//print_r($VIPfinal);
		
        ?></td>
			
			<td>            
                 <h3>Projects Filled </h3>
				 
 <?php
 
			//counting filled projects
			$full =0;
			for($i = 0; $i<count($VIPfinal); $i++){
		
			if(count($VIPfinal[$i]->desiredStudents)==$VIPfinal[$i]->max){
				$full++;
			}
		}
		
							if($full == 0){
							echo 'All projects still unsatisfied';
							}
						else{
		echo "<h5>". $full." projects satisfied</h5>";
		}
		
		
 
 
        //$PLc = array_values($_SESSION['VIPs']);
        
        for($i = 0; $i<count($VIPfinal); $i++){
		
		if(count($VIPfinal[$i]->desiredStudents)==$VIPfinal[$i]->max){
            /*echo '<tr>';
            echo '<td>';*/
			echo "<div class='pd2'>";
			echo 'at intdex:'.$i.'</br>';
			echo '<button type="button" id="s'.$i.'" class="regionalStud btn btn-lg btn-info" onclick="regionalStudFunction(this)">'.$VIPfinal[$i]->name.'</button></h5>';
           // echo '<h3>';
          //  echo $VIPfinal[$i]->name;
          //  echo '</h3>';
			
			//echo' <button type="button" id="s'.$i .'" class="regionalStud btn btn-primary btn-small  Button" onclick="regionalStudFunction(this)">Students and Project Information</button>';
			
			//not needed for now.
			/*echo '<span id = "pop" 
				
				title="Project information"
				class= "btn btn-lg btn-info"
				data-toggle="popover2">
				'.$VIPfinal[$i]->name.'
				</span>';*/
				echo "</br>";
				
				/*echo '<span id = "pop" 
				
				title="Project information"
				class= "btn btn-danger	 btn-lg pull-left"
				data-toggle="popover2">
				Project Stats
				</span>';*/
				
				echo " ";
				echo '<span id = "pop" 
				
				title="Project information"
				class= "btn btn-danger	 btn-lg centered"
				data-toggle="popover2">
				Project Skills
				</span>';
				echo " ";
				echo '<span id = "pop" 
				
				title="Project information"
				class= "btn btn-danger	 btn-lg pull-right"
				data-toggle="popover2">
				Students
				</span>';echo '<span id = "pop" 
				
				title="Project information"
				class= "btn btn-danger	 btn-lg pull-left"
				data-toggle="popover2">
				Project Stats
				</span>';
				
				
			echo '<div id="s'.$i.'" class="studentData">';
			echo '</br>';
			echo '';
			/*A button to display student skills*/
			
			
		//	echo '<div id="filled_proj_stats'.$i.'" class="filled_stats">';
            echo "<b>Head Professor's Rating: </b>".$VIPfinal[$i]->score."<br>";
            echo '<b>Student Interest Average: </b>';
            echo $VIPfinal[$i]->calculateAvgInterest();
            echo '<br>';
            echo '<b>Skill Total Fulfillment: </b>';
            echo $VIPfinal[$i]->calculateTotalFulfillment();
            echo '%<br>';
            echo '<b>Student Average Fulfillment: </b>';
            echo $VIPfinal[$i]->calculateAvgFulfillment();
            echo '%<br>';
            echo '<b>Student Total Overflow Skills:</b>';
            echo $VIPfinal[$i]->calculateTotalOverflow();
            echo '<br>';
            echo '<b>Skill Fulfillment Data:</b><br>';
            foreach ($VIPfinal[$i]->fulfilledSkills as $s) {
                echo '<li class="label label-success skill">';
                echo $s;
                echo '</li>';
                echo ' ';
            }    
			
	
			
			foreach ($VIPfinal[$i]->missingSkills as $s) {
			
			if(in_array($s,$unUsed_skills)|| in_array($s,$assigned_skills))
			{
			
			
                echo '<li class="label label-warning skill">';
                echo $s;
                echo '</li>';
                echo ' ';
			}
			else
			{
				 echo '<li class="label skill">';
                echo $s;
                echo '</li>';
                echo ' ';
			}
			
			}
            /*foreach ($VIPfinal[$i]->missingSkills as $s) {
                echo '<li class="label label-warning skill">';
                echo $s;
                echo '</li>';
                echo ' ';
            }*/
			//echo "</div>";
			
            echo '<br><h5>Students Added:(';
            echo count($VIPfinal[$i]->desiredStudents);
            echo ' out of ';
            echo $VIPfinal[$i]->max;
            echo ')  </h5>';
            
            foreach($VIPfinal[$i]->desiredStudents as $s){
                echo '<h6>';
                echo $s->name;
                echo '</h6>';
                echo 'Interest: ';
                echo $s->scoreList[$VIPfinal[$i]->id];
                echo '<br>';
                echo '% of Project Skills Acheived: ';
                echo $VIPfinal[$i]->figureSkillContribution($s);
                echo '%<br>';
                echo 'Amount of overflow skills: ';
                echo count($s->overflowSkills);
                echo '<br>';
                echo 'Skill contribution:';
                echo '<br>';

                if(count($s->fufilledSkills)>0){
                    foreach ($s->fufilledSkills as $skill) {
                       echo '<li class="label label-success skill">';
                       echo $skill;
                       echo '</li>';
                       echo ' ';
                   }
				   
				   foreach ($s->missingSkills as $skill) {
							
							echo '<li class="label label-warning skill">';
							echo $skill;
							echo '</li>';
							echo ' ';
						
					}
				   
				   
				   /*
                   foreach ($s->missingSkills as $skill) {
                       echo '<li class="label label-warning skill">';
                       echo $skill;
                       echo '</li>';
                       echo ' ';
                    }*/
               }
               else{
                   echo '<i>No Contribution</i><br>';
               }
               if(count($s->overflowSkills)>0){
                echo '<div id="overflow">';
                echo '<li class="label skill">Hover to reveal overflow skill</li>';
                echo '<div id="on-hover">';  
               }

               foreach ($s->overflowSkills as $skill) {
                   echo '<li class="label skill">';
                   echo $skill;
                   echo '</li>';
                   echo ' ';
               } 
               if(count($s->overflowSkills)>0){
               echo '</div>';
               echo '</div>';
               }

               echo '<br>';
            }
            echo '</div>';
           /*echo '</td>';
             echo '</tr>';*/
			  
			echo"</div>";
			 }
        }
        ?>
              </td>
         
     </table>
<div id="alignForm">
	
        <?php
                echo form_submit(array(
                    'id' => 'save matchings',
                    'name' => 'save matchings',
                    'type' => 'Submit',
                    'class' => 'btn btn-primary btn-small pull-left Button',
                    'value' => 'Save Match Configuration',
                ));
				
               // echo "</br></br>"
                ?>
				<?php echo form_close() ?>
				 
				
				
				
           
        <?php
                echo form_submit(array(
                    'id' => 'start over',
                    'name' => 'start over',
                    'type' => 'button',
                    'class' => 'btn btn-primary btn-small pull-left Button',
                    'value' => 'Start Over',
                ));
				
                //echo "</br></br>"
                ?>
				<?php echo form_close() ?>
				  <?php
                echo form_submit(array(
                    'id' => 'unmatch all',
                    'name' => 'unmatch all',
                    'type' => 'button',
                    'class' => 'btn btn-primary btn-small pull-left Button',
                    'value' => 'Unmatch All',
                ));
				
                //echo "</br></br>"
                ?>
				<?php echo form_close() ?>
					  <?php
                echo form_submit(array(
                    'id' => 'continue match',
                    'name' => 'continue match',
                    'type' => 'button',
                    'class' => 'btn btn-primary btn-small pull-left Button',
                    'value' => 'Continue Match',
                ));
			
                ?>
				<?php echo form_close() ?>
			
				</div>
				

     <?php// $_SESSION['otherProjectState']= $_POST["OtherProject"];?>
    <?php $this->load->view("template_footer"); ?>
    </body>
</html>
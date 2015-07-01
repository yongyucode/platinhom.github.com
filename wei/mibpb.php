<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-us">
<head>
<title>MIBPB from Wei Group</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Wei Group in Michigan State University" />
<meta name="description" content="MIBPB. Surface. Binding Energy. pKa" />
<link rel="shortcut icon" href="shortcut.png" />

<script type="text/javascript" src="../jsmol/JSmol.min.js"></script>
<script type="text/javascript" src="mibpbjsmol.js"></script>
<!--style>*{border:1px dashed black;}</style-->
</head>


<body>
<?php 
  function format_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $CWDir=getcwd();

  $indi = "1.0"; $outdi = "80"; 
  $grid = "1.0"; $ionstrength ="0.0";
  $probe = "1.4";$girdSurf = "1.0"; $buffersize = "1.0";
  $JobID=""; $filename="./1ajj.pqr";$RunResult=array();
  $netnowpath=".";//web relative path
  $filearray=pathinfo($filename);
  $prefixfile=$filearray['filename'];

  //saving error information
  $indiErr = $outdiErr = $gridErr =$ionstrengthErr="";
  $probeErr = $girdSurfErr = $buffersizeErr = $filenameErr = "";
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["IN_DIELEC"])) {
      $indiErr = "Interior Dielectric is required";
    } else {
      $indi = format_input($_POST["IN_DIELEC"]);
      if (!is_finite($indi)) {
        $indiErr = "Enter valid Interior Dielectric."; 
      }
    }
    if ($indiErr!=""){
      echo "<script>alert('{$indiErr}');history.back();</script>";
    }

    if (empty($_POST["OUT_DIELEC"])) {
      $outdiErr = "Outerior Dielectric is required";
    } else {
      $outdi = format_input($_POST["OUT_DIELEC"]);
      if (!is_finite($outdi)) {
        $outdiErr = "Enter valid Outerior Dielectric."; 
      }
    }
    if ($outdiErr!=""){
      echo "<script>alert('{$outdiErr}');history.back();</script>";
    }

    if (empty($_POST["GRID_RESOLUTION"])) {
      $gridErr = "grid resolution is required";
    } else {
      $grid = format_input($_POST["GRID_RESOLUTION"]);
      if (!is_finite($grid)) {
        $gridErr = "Enter valid grid resolution."; 
      }
    }
    if ($gridErr!=""){
      echo "<script>alert('{$gridErr}');history.back();</script>";
    }

    if (empty($_POST["ION_STRENGTH"])) {
      $ionstrengthErr = "Ion strength is required";
    } else {
      $ionstrength = format_input($_POST["ION_STRENGTH"]);
      if (!is_finite($ionstrength)) {
        $ionstrengthErr = "Enter valid ion strength."; 
      }
    }
    if ($ionstrengthErr!=""){
      echo "<script>alert('{$ionstrengthErr}');history.back();</script>";
    }

    if (empty($_POST["PROBE_RADIUS"])) {
      $probeErr = "Probe is required";
    } else {
      $probe = format_input($_POST["PROBE_RADIUS"]);
      // 检查名字是否包含字母和空格
      if (!is_finite($probe)) {
        $probeErr = "Enter valid probe radius."; 
      }
    }
    if ($probeErr!=""){
      echo "<script>alert('{$probeErr}');history.back();</script>";
    }

    if (empty($_POST["SURFACE_GRID"])) {
      $girdSurfErr = "Email is required";
    } else {
      $girdSurf = format_input($_POST["SURFACE_GRID"]);
      // 检查电邮地址语法是否有效
      if (!is_finite($girdSurf)) {
        $girdSurfErr = "Enter valid grid size."; 
      }
    }
    if ($girdSurfErr!=""){
      echo "<script>alert('{$girdSurfErr}');history.back();</script>";
    }

    if (empty($_POST["GRID_EXTEND"])) {
      $buffersizeErr = "buffersize is required";
    } else {
      $buffersize = format_input($_POST["GRID_EXTEND"]);
      // 检查电邮地址语法是否有效
      if (!is_finite($buffersize)) {
        $buffersizeErr = "Enter valid buffersize."; 
      }
    }
    if ($buffersizeErr!=""){
      echo "<script>alert('{$buffersizeErr}');history.back();</script>";
    }

    if (empty($_FILES["files"])) {
      $filenameErr = "Please upload an input file";
    } elseif($_FILES["files"]["size"]>5242880){ //size < 5M
      $filenameErr = "The input file is too large, please download our program to calculate in your machine!";
    }
    if ($filenameErr!=""){
      echo "<script>alert('{$buffersizeErr}');history.back();</script>";
    }

      //echo "For MIBPB: Inerior Dielectric: ".$indi."; Outerior Dielectric is: ".$outdi."; Grid size is: ".$grid."; Ion strength is: ".$ionstrength,"<br/>";
      //echo "For surface: Probe radius: ".$probe."; Grid size is: ".$girdSurf."; Buffer size is: ".$buffersize,"<br/>";
    $filename=$_FILES["files"]["name"];
    $filearray=pathinfo($filename);
    $prefixfile=$filearray['filename'];

    if ($_FILES["files"]["error"] > 0){
      echo "Return Code: " . $_FILES["files"]["error"] . "<br />";
      } else {
      //echo "Upload: " . $_FILES["files"]["name"] . "<br />";
      //echo "Type: " . $_FILES["files"]["type"] . "<br />";
      //echo "Size: " . ($_FILES["files"]["size"] / 1024) . " Kb<br />";
      //echo "Temp file: " . $_FILES["files"]["tmp_name"] . "<br />";
    }

    if (! empty($_POST["JOBID"])){
      $JobID = format_input($_POST["JOBID"]);
    }

    if (!file_exists("./MIBPBRun")){mkdir("./MIBPBRun");}
    if (!file_exists("./MIBPBRun/$JobID")){mkdir("./MIBPBRun/$JobID");}
    if (file_exists("./MIBPBRun/$JobID/" . $_FILES["files"]["name"]))
      {
        ;//echo $_FILES["files"]["name"] . " already exists. ";
      }
    else
      {//将上传文件移动到指定目录和文件名
      move_uploaded_file($_FILES["files"]["tmp_name"],
      "./MIBPBRun/$JobID/" . $_FILES["files"]["name"]);
      //echo "Stored in: " . "./MIBPBRun/$JobID/" . $_FILES["files"]["name"];
      //echo "Job ID is: ".$JobID."<br/><br/>";
      chdir("./MIBPBRun/$JobID/");

      $nowfilename=realpath("./{$filename}");

      copy("$CWDir/MS_Intersection","./MS_Intersection");
      copy("$CWDir/mibpb5","./mibpb5");
      chmod("./mibpb5",0777);
      chmod("./MS_Intersection",0777);
      rename("$filename","1234.pqr");
     
      array_push($RunResult,"MIBPB output: ");
      exec("echo '{$filename}' > {$JobID}.log");
      exec("echo 'MIBPB output: '>>{$JobID}.log");
      exec("./mibpb5 1234 eps0={$indi} eps1={$outdi} h={$grid} | tee -a {$JobID}.log",$RunResult);
      rename("1234.pqr","$filename");
      rename("1234.dx","$prefixfile".".dx");
      rename("1234.xyzr","$prefixfile".".xyzr");
      rename("1234.eng","$prefixfile".".eng");
     
      array_push($RunResult,"Surface output: ");
      exec("echo '\n\nSurface output: ' >> {$JobID}.log");
      exec("./MS_Intersection {$prefixfile}.xyzr $probe $girdSurf $buffersize | tee -a {$JobID}.log",$RunResult);
      exec("$CWDir/MarchingCubes",$RunResult);
      unlink("./mibpb5");
      unlink("./MS_Intersection");
      exec("zip -r Result_{$JobID}.zip ./* > /dev/null");
      /*foreach ($RunResult as $resultline){
        echo $resultline."<br/>";
      }*/
      //echo "<br/><br/>Your Results: <br/>";
    }
    //Convert to url path
    $netnowpath=str_replace($_SERVER['DOCUMENT_ROOT'],"",getcwd());
    //A method based on our script
    if ($netnowpath === getcwd()){
      $netnowpath = dirname($_SERVER['SCRIPT_NAME']);
      $netnowpath.="/MIBPBRun/{$JobID}";
    };
    /*$resultfiles=glob("*.*");
    foreach ($resultfiles as $eachfile){
      echo "<a href='{$netnowpath}/{$eachfile}'>{$eachfile}</a><br/>";
    }*/
  }
  elseif ($_SERVER["REQUEST_METHOD"] == "GET" && array_key_exists("JobID",$_GET)){
        $JobID=$_GET["JobID"];
        $netnowpath=dirname($_SERVER['SCRIPT_NAME']);
        $netnowpath.="/MIBPBRun/$JobID";

        if (file_exists("$CWDir/MIBPBRun/$JobID/$JobID.log")){
          $fhandle=fopen("$CWDir/MIBPBRun/$JobID/$JobID.log", "r");
          $filename=trim(fgets($fhandle));
          fclose($fhandle);
          $filearray=pathinfo($filename);
          $prefixfile=$filearray['filename'];
        }
  }
  else{
    //initial JobID
    $JobID=uniqid("mibpb");
  }
   
?>
<!--div style="background-color:white; margin:0 auto; display: block;padding:0px; width:1180px;"-->
<table align="center">
<tr><td>
<!--Right Panel-->
<div style="margin:auto;margin-right:30px;float:left;">
    <form enctype="multipart/form-data" action=<?php echo "{$_SERVER['PHP_SELF']}?software=mibpb&JobID={$JobID}"; ?> method="POST" >
      <input type="hidden" name="JOBID" value=<?php echo "$JobID" ?> >

      <!--Title informations-->
      <table width="630" border="0" align="center" cellpadding="0" cellspacing="2">
            <tr>
              <td valign="bottom" class="title"><a href="."><img align=left src="../wei/MIBPB-Title2.png" width="450" border="0" align="absbottom"></a><a href="http://users.math.msu.edu/users/wei/"><img align=right width=163px height=136px style="margin-right:0px;"src="../wei/msuwei-logo2.png"></a></td>
            </tr>
            <tr>
              <td class="arial_black" style="text-align:justify;"><hr style="color:#CCCCCC"><b>MIBPB</b>  is a software package for evaluating electrostatic properties of biomolecules via the solution of the Poisson-Boltzmann equation (PBE), an established two-scale model in biomolecular simulations. The PBE is one of the most popular implicit solvent models that explicitly describe atoms in biomolecules while represent interactions between molecules and solvent by a mean-field approximation. In this model, solvent is treated as a dielectric continuum, while ions within the solvent are assumed to have the Boltzmann distribution with respect to the electrostatic energy.  &nbsp;&nbsp;&nbsp;&nbsp; <a href="http://users.math.msu.edu/users/wei/MIBPB/index.html" target="_blank"><font color="blue"><b>[User Manual]</b></font></a></td>
            </tr>
      </table>

       <table width="630" border="1" align="center" cellpadding="2" cellspacing="1" background="">
          <tr>
            <td width="190" align="right" bgcolor="#CCFFCC" class="navagation_white STYLE3" style="border:1px solid #999999">  Input_File:&nbsp;&nbsp;</td>
            <td width="333" bgcolor="#CCFFCC" style="border:1px solid #999999"><input type="file" name="files"> <font color="red">*</font></td>
          </tr>


          <tr>
            <td width="190" rowspan="6" align="right" bgcolor="#59BC7B" class="navagation_white STYLE4" style="border:1px solid #999999">MIBPB Options</td>
            <td bgcolor="#59BC7B" style="border:1px solid #999999"><label><span class="STYLE2">
              <input type="text" size="6" name="IN_DIELEC" value=<?php echo "$indi" ?> > Interior Dielectric</span></label></td>
          </tr>
          <tr>
            <td bgcolor="#59BC7B" style="border:1px solid #999999"><span class="STYLE2">
              <input type="text" size="6" name="OUT_DIELEC" value=<?php echo "$outdi" ?> > Outerior Dielectric</span></td>
          </tr>
          <tr>
            <td bgcolor="#59BC7B" style="border:1px solid #999999"><span class="STYLE2">
              <input type="text" size="6" name="GRID_RESOLUTION" value=<?php echo "$grid" ?> > Grid Resolution</span></td>
          </tr>
          <tr>
            <td bgcolor="#59BC7B" style="border:1px solid #999999"><span class="STYLE2">
              <input type="text" size="6" name="ION_STRENGTH" value=<?php echo "$ionstrength" ?> > Ion Strength</span></td>
          </tr>
          <tr> 
              <td bgcolor="#59BC7B" style="border:1px solid #999999">Linearized PB: <label><span class="STYLE2">
              <input type="checkbox" name="LINEARIZED" value="yes" checked>Yes </span></label>
              </td>
          </tr>
          <tr> 
              <td bgcolor="#59BC7B" style="border:1px solid #999999">Simplified Solver: <label><span class="STYLE2">
              <input type="checkbox" name="SIMPLIFIED" value="yes">Yes </span></label>
              </td>
          </tr>

          <tr>
            <td width="190" rowspan="4" align="right" bgcolor="#CCFFCC" class="navagation_white STYLE4" style="border:1px solid #999999">Surface Options &nbsp;<input type="checkbox" name="SURFACE_OPTION" value="yes" checked>Yes</td>
            <td bgcolor="#CCFFCC" style="border:1px solid #999999">Surface Method: <label><span class="STYLE2">
              <input type="radio" size="6" name="SURFACE_METHOD" value="ESES" checked>ESES </span></label>
              <label><span class="STYLE2">
              <input type="radio" size="6" name="SURFACE_METHOD" value="MSMS">MSMS </span></label>
              </td>
          </tr>
          <tr>
            <td bgcolor="#CCFFCC" style="border:1px solid #999999"><span class="STYLE2">
              <input type="text" size="6" name="PROBE_RADIUS" value=<?php echo "$probe" ?> > Probe Radius</span></td>
          </tr>
          <tr>
            <td bgcolor="#CCFFCC" style="border:1px solid #999999"><span class="STYLE2">
              <input type="text" size="6" name="SURFACE_GRID" value=<?php echo "$girdSurf" ?> > Grid Resolution</span></td>
          </tr>
          <tr>
            <td bgcolor="#CCFFCC" style="border:1px solid #999999"><span class="STYLE2">
              <input type="text" size="6" name="GRID_EXTEND" value=<?php echo "$buffersize" ?> > Grid Extension</span></td>
          </tr>

          <tr>
            <td width="190" rowspan="2" align="right" bgcolor="#59BC7B" class="navagation_white STYLE4" style="border:1px solid #999999">PDB2PQR Options &nbsp;<input type="checkbox" name="PDB2PQR_OPTION" value="yes" checked>Yes</td>
            <td bgcolor="#59BC7B" style="border:1px solid #999999">Force Field: 
              <select size="1" name="SELE_FORCEFIELD"><option value ="AMBER">AMBER</option><option value ="CHARMM">CHARMM</option><option value ="PARSE">PARSE</option><option value ="PEOEPB">PEOEPB</option><option value ="SWANSON">SWANSON</option><option value ="TYL06">TYL06</option></select>
              </td>
          </tr>
          <tr>
            <td bgcolor="#59BC7B" style="border:1px solid #999999">Protonation: at pH: <input type="text" size="4" name="PH_ASSIGN" value="7.0"> by: 
              <select size="1" name="SELE_PROTONATION"><option value ="PROPKA">PROPKA</option><option value ="DONT">Don't use</option></select></td>
          </tr>

          <tr>
            <td width="190" rowspan="2" align="right" bgcolor="#CCFFCC" class="navagation_white STYLE4" style="border:1px solid #999999">pKa Calculation &nbsp;<input type="checkbox" name="PKA_CALU" value="yes">Yes</td>
            <td bgcolor="#CCFFCC" style="border:1px solid #999999">Residue Type: 
              <select size="1" name="SELE_RESTYPE"><option value ="ARG">ARG</option><option value ="LYS">LYS</option><option value ="HIS">HIS</option><option value ="ASP">ASP</option><option value ="GLU">GLU</option><option value ="CYS">CYS</option><option value ="TYR">TYR</option></select>
              </td>
          </tr>
          <tr>
            <td bgcolor="#CCFFCC" style="border:1px solid #999999">Residue ID: 
              <select size="1" name="SELE_RESTYPE"></select></td>
          </tr>

          <!--tr>
            <td width="190" align="right" bgcolor="#59BC7B" class="navagation_white STYLE3" style="border:1px solid #999999">  NUMBER_OF_HITS:&nbsp;&nbsp;</td>
            <td width="333" bgcolor="#59BC7B" style="border:1px solid #999999"><span class="STYLE2">
              <input type="text" size="6" name="NUMBER_OF_HITS" value="5"> top hits extract from LIGAND_MOL2_FILE</span></td>
          </tr-->

          <!--tr>
            <td width="190" align="right" bgcolor="#CCFFCC" class="navagation_white STYLE3" style="border:1px solid #999999">  Showing Electrostatic Surface:&nbsp;&nbsp;</td>
            <td width="333" bgcolor="#CCFFCC" style="border:1px solid #999999"><span class="STYLE2">
              <input type="checkbox" checked name="SHOWING_ELEC_SURFACE" value="yes" >Yes</span></td>
          </tr-->

          <tr>
            <td width="190" align="right" bgcolor="#59BC7B" class="navagation_white STYLE4" style="border:1px solid #999999">Job Title: </td>
            <td bgcolor="#59BC7B" style="border:1px solid #999999"><label><span class="STYLE2">
              <input type="text" size="40" name="JOB_TITLE" value=""></span></label>
              </td>
          </tr>
          <tr>
            <td width="190" align="right" bgcolor="#CCFFCC" class="navagation_white STYLE4" style="border:1px solid #999999">User Email: </td>
            <td bgcolor="#CCFFCC" style="border:1px solid #999999"><label ><span class="STYLE2">
              <input type="text" size="40" name="USER_EMAIL" value=""></span></label></td>
          </tr>

          <!--<tr>
           <td width="161" align="right" bgcolor="#59BC7B" class="navagation_white" style="border:1px solid #999999">Your DB:</td>
       <td width="319" style="border:1px solid #999999" bgcolor="#59BC7B">
            <input type="file" name="userdb">       </td>
        </tr-->
          <tr>
            <td colspan="2" align="center" style="border:1px solid #999999" bgcolor="#59BC7B"><input type="reset" name="Reset1" class="contents" value="Default"> &nbsp;&nbsp; <input type="submit" name="Submit1" class="contents" value="Submit"></td>
          </tr>

          <!--Parameter Instruction-->
          <tr>
            <td colspan="2" class="arial_black" ><br/>
                <div align="center" style="font-size:28px;"><strong>User Guide </strong></div>
                &nbsp;&nbsp;<strong>MIBPB Options:</strong>
                <ul>
                  <li><b> Interior Dielectric</b>: The dielectric constant in solute, the default value is <em>1.0</em> in the MIBPB package. </li>

                  <li><b> Outerior Dielectric</b>: The dielectric constant in solvent, the default value is <em>80.0</em> in the MIBPB package. </li>

                  <li><b> Grid Resolution</b>: The grid size utilized in the discratization of the PB equation, in the current PB solver it is restricted in the interval [0:3; 1:2], default value is <em>1.0</em>. </li>

                  <li><b> Ion Strength</b>: The ionic strength of the solvent, in the unit <em>mol/L</em>, the default value is <em>0</em>.</li>

                  <li><b> Linearized PB</b>: Indicator of using linearized PB or non-linearized PB. Default is <em>Linerized PB</em>. </li>

                  <li><b> Simplified Solver</b>: Indicator of using the MIBPB solver or the simplified solver. Default is <em>MIBPB solver(unchosen)</em>.</li>
                </ul>
                &nbsp;&nbsp;<strong>Surface Options:</strong>
                <ul>
                  <li><b> Surface Method</b>: The method of generating surface for MIBPB, the default value is <em>ESES</em> in the MIBPB package. User can also use MSMS surface. </li>

                  <li><b> Probe Radius</b>: The probe radius used for surface generation, the range of this value is [0:8; 2:0] in the current version of the MIBPB package, default <em>1.4</em>. </li>

                  <li><b> Grid Resolution</b>: The grid size for generating the surface. </li>

                  <li><b> Grid Extension</b>: ????? </li>
                </ul>
                &nbsp;&nbsp;<strong>PDB2PQR Options:</strong>
                <ul>
                  <li><b> Force Field</b>: The force field to be used for process the PDB file. </li>

                  <li><b> Protonation</b>: The method for protonation at given pH. </li>
                </ul>
                &nbsp;&nbsp;<strong>pKa Options:</strong>
                <ul>
                  <li><b> Residue Type</b>: The type of residue to be calculated. You can only choose the Residue ID after you select a residue type. </li>

                  <li><b> Residue ID</b>: The exact residue ID for calculatiton. </li>
                </ul>
                &nbsp;&nbsp;<strong>Other Options:</strong>
                <ul>
                  <!--li><b> Showing Electrostatic Surface</b>: Whether  </li-->

                  <li><b> Job Title</b>: The job title for the MIBPB calculation. </li>

                  <li><b> User Email</b>: The result will be sent to the user email. We recommend you to use the email function when the job may take a long time.</li>
                </ul>
                &nbsp;&nbsp;<strong>View Results Online:</strong>
                <ul>
                  <li><b> Molecular Visualization</b>: You can change the mode and color for visualization of your molecule. The molecule can be shown as: Cartoon, Rocket, Ribbon, MeshRibbon, Trace, Backbone, Ball&Stick, Wireframe and Space Fill by selecting the <b>"Show molecule as"</b> option under the visualization window. The color for the molecule can also be chosen by <b>"Color As"</b> option. </li>

                  <li><b> Surface Options</b>: You can visualize the surface based on the JMol method or the surface calculated by ESES/MSMS during the computation. The JMol surface can be generated or deleted by the <b>"JMol Surface"</b> option. You can generate vdw surface (very fast), solvent accessible surface, solvent excluded surface and molecular surface by JMol. You can also control the surface showing as dots or mesh in this options after you generate a surface. The calculated surface in your job can be loaded by <b>"Load Surface"</b> button. The loaded surface depends on the options in "Surface Options" panel. The transparency and color for surface can also be controlled by the <b>"Translucent"</b> and <b>"Color"</b> panel, respectively. The larger value the translucent is, the more transparent the surface is. </li>

                  <li><b> Electrostatic Potential (ESP) Visualization</b>: The electrostatic potential result will be saved in ABPS format (*.dx). The ESP result can be mapped onto current surface by clicking the <b>"Load ESP"</b>button. You can also load all your results including the calculated surface and ESP by clicking the <b>"Load All"</b>button. The color scheme for the surface based on ESP mapping can be control by the <b>"Color"</b> option in the surface option. The BWR, RWB, RGB, High, Low and Rainbow scheme can be used for ESP coloring. The range of the ESP values for coloring can be easily control by the ESP min/max options by either entering the exact value or using the scroll bar. </li>

                  <li><b> Download Results</b>: You can download all your result files in compacted zip file by clicking the <b>"Download Result"</b> button. You can also download the Jmol format file or PNG format file to re-visualize your result in JMol. A .jmol file is simply a ZIP file that can be dragged back into this applet or the Jmol app to recreate the exact state when it was created.</li>

                </ul>
            </td>
          </tr>

          <!--Reference-->
          <tr>
            <td colspan="2" class="arial_black"></br>
                &nbsp;&nbsp;<strong>Reference:</strong>
                <ol>
                  <li>Duan Chen,  Zhan  Chen, Changjun  Chen, Weihua  Geng and Guo-Wei  Wei. <em style="font-style: normal">MIBPB: A software package for  electrostatic  analysis. </em> <em>J. Comput. Chem. </em><em style="font-style: normal"> <b>2011</b>, </em> <em>32</em><em style="font-style: normal">, 756–770. </em></li>

                  <li><em style="font-style: normal">Y.C. Zhou, M.  Feig and G.W. Wei. Highly accurate biomolecular electrostatics in continuum dielectric environments. </em><em>J. Comput. Chem. </em><em style="font-style: normal"> <b>2008</b>, </em><em>29</em><em style="font-style: normal">, 87-97.</em></li>

                  <li><em style="font-style: normal">W.H. Geng, S.N. Yu and G.W. Wei. Treatment of charge singularities in implicit solvent models. </em><em>J. Chem. Phys. </em><em style="font-style: normal"><b>2007</b>, </em><em>127</em><em style="font-style: normal">, 114106 (20 pages).</em></li>

                  <li><em style="font-style: normal">S. N. Yu, W. H. Geng and G.W. Wei. Treatment of geometric singularities in implicit solvent models. </em><em>J. Chem. Phys.</em><em style="font-style: normal">, <b>2007</b>, </em><em>126</em><em style="font-style: normal">, 244108 (13 pages).</em></li>
                </ol>
            </td>
          </tr>

          <tr>
        <td colspan="2" align="left" class="arial_black"><img src="../wei/download.gif" border=0><b><font color="#006600">DOWNLOAD</font></b><br>
For academic/governmental users, you may download and use MIBPB for free under a license agreement. Please follow the instructions below to <a href="?p=42&software=xscore&action=download"><font color="#006600">register with us and download MIBPB.</font></a><br>
For industrial/commercial users, a moderate license fee may apply. Please contact us directly at <a href="mailto:wei@math.msu.edu"><font color="#006600">wei@math.msu.edu</font></a>.
<br><br>
</td>
  </tr>
  <tr><td colspan="2">If you have any questions or bugs to report, please feel free to contact me: zhaozxcpu@hotmail.com<br/>
  <span style="font-size: 20px; align:center;"><a href="mailto:zhaozxcpu@hotmail.com"><b>Webmaster: Zhixiong Zhao</b>
  </span></a></td>
  </tr>
        </table>
  </form> 
</div>


<!--molecule view-->
<div style="width:552px;height:900px;float:left;">
  <div id="jsmolmainwindow" style="margin: auto; text-align: center; width: 512px; height:900px; float:left; position:fixed;">

    <!--This input can be modified-->
    <script type="text/javascript">initJmol(<?php echo "'{$netnowpath}/".basename($filename)."'" ?>,512)</script>

    <div style="float:left;width:552px;margin:0px;padding:0px;">
      <table valign="center" style="text-align:left; font-size: 6pt; font-family:Arial; margin:0px;padding:0px;width:552px;">
      <tr>
      <td colspan="3"  style='width:200px;'>
      <span >Show molecule as: </span>
      <select id="selMolShow" onkeypress='showMolAs()' onchange='showMolAs()' style='width:92pt'>
        <option value='cartoon'>Cartoon</option>
        <option value='rocket'>Rocket</option>
        <option value='ribbon'>Ribbon</option>
        <option value='meshribbon'>MeshRibbon</option>
        <option value='trace'>Trace</option>
        <option value='backbone'>Backbone</option>
        <option value='ballstick'>Ball&Stick</option>
        <option value='wireframe'>Wireframe</option>
        <option value='spacefill'>Space Fill</option></select>
      </td>

      <td colspan="4"  style='width:320px;'>
      <span>Color as:</span>
      <select id="selColorSel" onkeypress='showMolAsColor()' onchange='showMolAsColor()' style='width:121pt'>
        <option value='structure'>Secondary Structure</option>
        <option value="cpk">CPK</option>
        <option value="group">Terminal</option>
        <option value="amino">Amino Type</option>
        <option value="relativeTemperature">B-facter</option>
        <option value="partialCharge">Partial Charge</option>
        <option value="white">White</option>
        <option value="red">Red</option>
        <option value="blue">Blue</option></select>
      </td>
      </tr>

      <tr>
      <td colspan="3" style='width:200px;'>
        JMol Surface: 
        <select id="selJmolSurface" onkeypress='SelJmolsurface()' onchange='SelJmolsurface()' style='width:112pt'>
        <option value="off">off</option>
        <option value='vdw'>van der Waals</option>
        <option value="sasurface">Solvent-Accessible</option>
        <option value="solvent">Solvent-Excluded</option>
        <option value="molecular">Molecular</option>
        <option value="mesh nofill nodots">Mesh</option>
        <option value="dots nofill nomesh">Dots</option>
        <option value="delete">Delete</option>
        </select>
      </td>

      <td colspan="4">
      Translucent:
      <select id="selTranslucent" onkeypress='SurfaceTranslucent()' onchange='SurfaceTranslucent()' style='width:30pt'>
        <option value='0'>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option></select>

      Color:
      <select id="selSurfaceColor" onkeypress='SelSurfaceColor()' onchange='SelSurfaceColor()' style='width:50pt'>
        <option value='bwr'>BWR</option>
        <option value="rwb">RWB</option>
        <option value="rgb">RGB</option>
        <option value="high">High</option>
        <option value="low">Low</option>
        <option value="roygb">Rainbow</option>
        <option value="red">Red</option>
        <option value="green">Green</option>
        <option value="white">White</option>
        <option value="blue">Blue</option>
      </select>
      </td>
      </tr>
      <tr>
      <td >ESP min:</td><td><input id="espmin" value='-1' style='width:20pt;text-align:right' onkeypress='SetESPRange();setScrollValue("min",document.getElementById("espmin").value*100);'> 
      </td>
      <td  valign="top">
      <script type="text/javascript">document.write(newScroller("min","","doScroll",140,-1,-1,false,-500,500,-100,4, "mouseup"));</script>
      <!--div id="src_min" onscroll="checkScroll('min')" style="position:absolute; font-size: 2pt; height:30px; width:100px; overflow:auto"><img src="transp.gif" height=1px width=1000px></div-->
      </td>
      <td>max:</td><td><input id="espmax" value='1' style='width:20pt;text-align:right' onkeypress='SetESPRange();setScrollValue("max",document.getElementById("espmax").value*100);'> 
      </td>
      <td valign="top">
      <script type="text/javascript">document.write(newScroller("max","","doScroll",140,-1,-1,false,-500,500,100,4, "mouseup"));</script>
      <!--div id="src_max" onscroll="checkScroll('max')" style="position:absolute; font-size: 2pt; height:30px; width:100px; overflow:auto"><img src="transp.gif" height=1px width=1000px></div-->
      </td>
      <!--script type="text/javascript">resetScrollerMaxMin("min",2*(-100),2*100)</script-->
      <td style='width:73pt;'>Scale
      <input id="espscale" value='5' style='width:20pt;text-align:right' onkeypress='var scale=document.getElementById("espscale").value;resetScrollerMaxMin("min",scale*(-100),scale*100);resetScrollerMaxMin("max",scale*(-100),scale*100);'> 
      </td>
      </tr>
    </table>
    <script type="text/javascript">initScrollers();initJmolButton(<?php echo "'{$netnowpath}','{$prefixfile}'" ?>);</script>
    
    <?php
    //download bottom   
    if (file_exists("$CWDir/MIBPBRun/$JobID/Result_{$JobID}.zip")) {
      echo "<a target='_blank' href='{$netnowpath}/Result_{$JobID}.zip'>Download Results</a>";
      echo "<script>Jmol.script(jmolApplet0,'font echo 20 serif; set echo top center;echo MIBPB"."  "."Done;');</script>";
    }
    ?>
    </div>
  </div>
</div>

<!--img width=138px height=115px style="position:fixed; margin-right:0px; right:20px; bottom:10px;" src="../wei/msulogo.gif"-->
<!--/div-->
</td></tr></table>
</body>
</html>
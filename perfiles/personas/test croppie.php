<?php
    include("../../h.php"); 
    if(isset($_POST['imagebase64'])){
        
        $data = $_POST['imagebase64'];

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);

        $file = file_put_contents('../../uploads/per/img/'.hash('sha1',$data).'.png', $data);     
       
    }
    
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Test crop</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="../../resources/plugins/slick.min.js"></script>
 <script type="text/javascript" src="../../resources/scripts/custom-script.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.5.1/croppie.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    var $uploadCrop;

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();          
            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                });
                $('.upload-demo').addClass('ready');
            }           
            reader.readAsDataURL(input.files[0]);
        }
    }

    $uploadCrop = $('#preview').croppie({
        viewport: {
            width: 200,
            height: 200,
            type: 'circle'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#upload').on('change', function () { readFile(this); });
    $('.form_submit').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'original'
        }).then(function (resp) {
            $('#imagebase64').val(resp);
            $('#form').submit();
        });
return false;
    });

});
</script>
</head>

<body>
    <form action="test croppie.php" id="form" method="post">
    <div id="menu0" class="tab-pane fade in active">
        <div class="row padding-32">
            <div class="col-sm-6 col-xs-12">
                <p>Carga tu foto de perfil</p>
                
                
                <label for="upload_avatar">
                    <input  type="file" name="upfile" id="upload" >
                </label>
                <button type="button" class="form_submit" id="guardar_avatar">Guardar</button>
            </div>
            <div class="col-sm-6 col-xs-12">
                <div id="preview" style="height:250px; width: 100%;"></div>
            </div>
            <input type="hidden" id="imagebase64" name="imagebase64">
        </div>
    </div>
    </form>
    
        
    
</body>
</html>
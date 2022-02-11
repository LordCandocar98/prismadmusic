jQuery(document).ready(function($){

  let canvas = document.getElementById("canvas");
  let signaturePad = new SignaturePad(canvas);

  $('#limpiar').on('click', function(){
      signaturePad.clear();
  });

  $('#btn-firma,#btn-close').click(function (){
    if(signaturePad.isEmpty()){
        $("#acepta_Contrato").prop("checked", false);
    }else{
        $("#acepta_Contrato").prop("checked", true);
        $('#modalContrato').modal('hide');
        signaturePad.toDataURL();
    }
  });

});
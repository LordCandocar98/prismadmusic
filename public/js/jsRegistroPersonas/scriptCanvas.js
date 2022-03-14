jQuery(document).ready(function($){
  let canvas = document.getElementById("canvas");
  let signaturePad = new SignaturePad(canvas);

  $('#limpiar').on('click', function(){
      signaturePad.clear();
      $("#firma").val("");
  });

  $('#btn-firma,#btn-close,#btn-snd').click(function (){
    if(signaturePad.isEmpty()){
        console.log("Falto firmar el contrato");
        $("#acepta_Contrato").prop("checked", false);
    }else{
        $("#acepta_Contrato").prop("checked", true);
        $('#modalContrato').modal('hide');

        $('#firma').val(signaturePad.toDataURL());
    }
  });

});
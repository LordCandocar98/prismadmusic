/* Altura de widgets */
$(document).ready(function(){
    let heightTitle = [];
    let heightP = [];

    $('.panel.widget h4').each(function(){
      heightTitle.push($(this).height());
    });

    $('.panel.widget p').each(function(){
      heightP.push($(this).height());
      console.log($(this).height());
    });

  let maxTitle = Math.max.apply(null, heightTitle);
  let maxP = Math.max.apply(null, heightP);

  $('.panel.widget h4').each(function(){
    //Aplicamos a todos los divs la misma altura
    $(this).height(maxTitle);
  });

  $('.panel.widget p').each(function(){
    //Aplicamos a todos los divs la misma altura
    $(this).height(maxP);
  });
});
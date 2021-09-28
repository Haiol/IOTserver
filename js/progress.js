
/* Code By Webdevtrick ( https://webdevtrick.com ) */
function Circlle_TEMP(el){
  $(el).circleProgress({fill: {color: '#049dff'}})
    .on('circle-animation-progress', function(event, progress, stepValue){
 $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2)+'℃');
 });  
};
Circlle_TEMP('.round_temp');

function Circlle_HUM(el){
  $(el).circleProgress({fill: {color: '#fdba04'}})
    .on('circle-animation-progress', function(event, progress, stepValue){
 $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2)+'%');
 });  
};
Circlle_HUM('.round_hum');

function reload_Circlle(el,jl){
  $(el).circleProgress({animation: false,fill: {color: '#049dff'}})
    .on('circle-animation-progress', function(event, progress, stepValue){
 $(this).find('strong').text(String(stepValue.toFixed(2)).substr(2)+'℃');
 });  
 $(jl).circleProgress({animation: false,fill: {color: '#fdba04'}})
 .on('circle-animation-progress', function(event, progress, stepValue){
$(this).find('strong').text(String(stepValue.toFixed(2)).substr(2)+'%');
});  
};
// reload_Circlle('.round_temp','.round_hum');
setInterval("reload_Circlle('.round_temp','.round_hum')",6000);
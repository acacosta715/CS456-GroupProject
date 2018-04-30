$( selectDate );

function selectDate( )
{
  $( "#userDate" ).datepicker({ dateFormat: "m/d/yy" } );
  var d = $("#userDate").datepicker('getDate');
  $("#userDate").val() = d;
}

$().ready(function() {
var options = {
onMonthChanged: function(dateIn) {
//this could be an Ajax call to the backend to get this months events


return true;
}
};

$.calendar.Initialize(options);


}); 
/**
 * Created by YJS on 2016-07-02.
 */
/**
 * Created by YJS on 2016-07-02.
 */
var project_id = $("#project_id").val();

function updateList( url, item, offset, limit )
{
    $.get( url, {project_id:project_id, offset:offset, limit:limit }, function( data, status ){
        if( status == "success" )
        {
            var json = JSON.parse(data);
            var dataLen = 0;
            var main = item;
            for( var i=0;i<json.data.length;i++ )
            {
                var html = "<li>"+
                    "<a href='detail?project_id="+project_id+"&aid="+json.data[i].id+"&type="+json.type+"' >"+
                    "<em></em><p><span>"+json.data[i].title+"</span><i></i></p><b></b>"+
                    "</a></li>";
                main.append( html );
            }
        }
    });
}

/**
 * Created by YJS on 2016-07-02.
 */
function updateNews( offset, limit )
{
    updateList( "getNewsList",  $(".mainmenu"), offset, limit );
}
$(document).ready(function(){
   updateNews( 0, 10 );
});
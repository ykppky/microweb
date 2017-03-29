var curRow;
var agent_id;
function settingagent(obj)
{
	  //agent_id = parseInt($(obj).attr("agent_id"));
		//curRow = parseInt($(obj).attr("row_id"));
		$("#agent").click();
}
$(function () { $('#myModal').on('hide.bs.modal', function () {
	$('#toggleTable').bootstrapTable('destroy');
	$('#toggleTable').bootstrapTable();
    })
 });
$(document).ready(function(){
	
	$("#agentselected").click(function(){
		var tablehtml='';
		var data=$("#toggleTable").bootstrapTable('getSelections');
		var trList = $("#list-order").children("tbody").children("tr");
		/*var tdArr=trList.eq(curRow).find("td");
		if( data.length>0 )
		tdArr.eq(5).html(data[0].agent_name);
			
		var order_info = $("#order_info"+curRow).val();
		var arr = order_info.split(";");
		order_info = arr[0]+";"+data[0].agent_id;
		$("#order_info"+curRow).val(order_info);
		$('#myModal').modal('hide');*/
		for( i=0;i<trList.length;i++)
		{
			var tdArr=trList.eq(i).find("td");
			tdArr.eq(5).html(data[0].agent_name);
		}
		$("#order_agent").val(data[0].agent_id+";"+data[0].agent_name);
		$('#myModal').modal('hide');
	});
}
);

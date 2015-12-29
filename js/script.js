var globalIDs= [];
var currentSchoolId = 0;
var pathName = '';


function main (){
	var hashTag = window.location.hash;
	var schoolId = hashTag.substring(8);
	if ( schoolId != '' ) {
		ispalnyat(schoolId);
	}else{
		var qParams = parseQueryString();
		console.log(qParams);

		$(document).ready(function($) {
			var windowHeight = $(window).height();
			$("#dialogContent").css('min-height', windowHeight +'px');
			loadSchoolList(qParams['q'], qParams['order']);
		});
	}
}

$(window).load(function() {
	main();
});

$(window).on('hashchange', function() {
	main();
});


function parseQueryString(){
	var qParams = {};
	var qstr = window.location.search.substring(1);
	var qparts = qstr.split('&');
	var qParams = {};
	qparts.map(function(qp){
		var p = qp.split('=');
		if( p.length == 2 ){
			qParams[p[0]] = p[1];
		}
	});
	return qParams;
}

function loadSchoolList(q, order, callback){
	q = q || '';
	order = order || '';
	params ={
		q:q,
		order:order
	}
	// oreder= oreder || '';
	$.ajax({
		url: pathName + '/output.php',
		type: 'GET',
		data: params,
		dataType: 'json'

	}).done(function(result, i) {
		result.map(function(item) {
			$('.cubes').append('<div id="box-5" class="box"><div class="rotate"><h5>'+item.schoolName+'</h5><img src="' + item.image_path + '"><a data-id="'+item.id+'"  href=""><span class="caption rotate-caption"><h3>'+item.schoolName+'</h3><br></span></a></div></div></div>');
			globalIDs.push(item.id);
		});
		attachOnClick();
		if (typeof callback != 'undefined') {
			callback();
		};

	}).fail(function(err) {
		console.log(err);

	}).always(function() {
		console.log("complete");
	});

}

function navigationHandlers(){
	$('#dialog').find('.btnLeft').on('click', function(event) {
		console.log('btnLeft');
		event.preventDefault();
		// var firstElement = globalIDs[0];
		var previousIndex = globalIDs.indexOf(currentSchoolId) -1;
		if (previousIndex==-1) {
			previousIndex=globalIDs.length-1;
		};
		var currentId = globalIDs[previousIndex];
		ispalnyat(currentId);
	});

	$('#dialog').find('.btnRight').on('click', function(event) {
		console.log('btnRight');
		event.preventDefault();
		// var lastElement=globalIDs[globalIDs.length-1];
		var nextIndex = globalIDs.indexOf(currentSchoolId)+1;
		if (nextIndex == globalIDs.length) {
			nextIndex = 0;
		}
		var currentId = globalIDs[nextIndex];
		console.log('currentId: ' + currentId);
		ispalnyat(currentId);
	});

	$('.modal .close').on('click', function(e){
		e.preventDefault();
		$.modal().close();
	});
}


function ispalnyat (currentId) {
	// ajax start
	$.ajax({
		url: pathName + '/output.php?id=' + currentId,
		type: 'GET',
		dataType: 'json'

	}).done(function(result) {
		location.hash='/school'+result.id;

		currentSchoolId = result.id;
		$('#dialogContent').empty().html($("#dialogScript").tmpl(result));
		$('#edit').empty().html('<a href="update.php?id=' + currentSchoolId + '"class="btn btn-warning">edit</a>');
		// popup start
		$('#dialog').modal().open({
			closeOnESC: true,
			onOpen: function(overlay, localOptions){
				if (globalIDs.length == 0) {
					loadSchoolList('', null, function(){
						navigationHandlers();
					});
				}else {
					navigationHandlers();
				}
			},
		});

	}).fail(function() {
		console.log("error");

	}).always(function() {
		console.log("complete");
	});
}

function attachOnClick() {
	$('.box a').on('click', function(e){
		e.preventDefault();
		var currentId = $(this).data('id');
		ispalnyat(currentId);
	});
}

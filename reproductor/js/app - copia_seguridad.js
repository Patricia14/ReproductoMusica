$(document).ready(function(){
    getSongs();

});

var audio = document.getElementById('player'); //varible que hara que reproduzca o pause una cancion
var music; //contendra arreglo que se llenara del JSON

function getSongs(){
	$.getJSON("js/logs.json",function(mjson){
           music = mjson;
           genLIST(music);

	});
}
function playSong(id){
	console.log(id);


      var long = music;
       if(id>=long.length){
       	console.log('Se acabó');
       	audio.pause();
       }else{
       	$('#img-album').attr('src',music[id].image);
	    $('#player').attr('src',music[id].song);
	    $('#player').attr('class',music[id].id);
	    audio.play();
	    console.log('hay mas canciones');
	    scheduleSong(id);
	      siguiente(id);
        atras(id);
       }
	
}


function genLIST(music){
      
	$.each(music,function(i,song){
         $('#playlist').append('<a href="#"><li class="list-group-item" id="'+i+'"><h5 class="juanito" ="'+song.id+'">'+song.nombre+'</h5></li>');
	});
	$('#playlist li').click(function(){

        var selectedsong = $(this).attr('id');
        var contendra = parseInt(selectedsong);
        //console.log(selectedsong);

        playSong(contendra);
        siguiente(contendra);
        atras(contendra);
        
	});

	


}

function siguiente(id){
$('#siguiente').click(function(){

	
	id++;
	
        
        playSong(id);
        
        
	});
}

function atras(id){
$('#anterior').click(function(){
	
	id--;
	//alert(id);
    if(id < 0){
    	audio.pause();
    }else {
    	
    	  playSong(id);
    	  
    	 
    }
	
      
       
	});
}



function scheduleSong(id){
	audio.onended = function(){
		console.log('Termino la cancion');
		playSong(parseInt(id)+1)
	}
}



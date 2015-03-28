<script async src="assets/js/jquery.js" type="text/javascript"></script>
<script async src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script>
	$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
			$("#avatar").toggleClass("toggled");
			$(".sidebar-nav").toggleClass("toggled");
			$(".textos").toggleClass("toggled");
	});
</script>
<script>
//Valida que en un campo solo se puedan ingresar letras
//Sintaxis html= onkeypress="txtletras()"
function txtletras() {
    if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
        event.returnValue = false;
}
//Valida que en un campo solo se puedan ingresar letras
//Sintaxis html= onkeypress="txtnumeros()"
function txtnumeros() {
    if ((event.keyCode < 48) || (event.keyCode > 57)){ 
        event.returnValue = false;
        
    }
}
//Mascaras de entrada para campos tipo text

//Patron para fecha espaÃ±ol con formato aaaa-mm-dd
var patron = new Array(4,2,2)
//Patron para fecha ingles con formato mm-dd-aaaa
var patroning = new Array(2,2,4)
//Patron para telefono con formato ####-####
var patron2 = new Array(4,4)
//Patron para dui con formato ########-#
var patron3 = new Array(8,1)
//Patron para hora con formato ##:##
var patron4 = new Array(2,2)
function mascara(d,sep,pat,nums){
    if(d.valant != d.value){
        val = d.value
        largo = val.length
        val = val.split(sep)
        val2 = ''
        for(r=0;r<val.length;r++){
            val2 += val[r]	
        }
        if(nums){
            for(z=0;z<val2.length;z++){
                if(isNaN(val2.charAt(z))){
                    letra = new RegExp(val2.charAt(z),"g")
		            val2 = val2.replace(letra,"")
		        }
            }
        }
        val = ''
        val3 = new Array()
        for(s=0; s<pat.length; s++){
            val3[s] = val2.substring(0,pat[s])
		    val2 = val2.substr(pat[s])
        }
        for(q=0;q<val3.length; q++){
            if(q ==0){
		      val = val3[q]
            }else{
                if(val3[q] != ""){
                    val += sep + val3[q]
                }
            }
        }
            d.value = val
            d.valant = val
    }
}
</script>
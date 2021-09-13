function calcul() {
    var num1 = document.getElementById("nbr1").value;
    var num2 = document.getElementById("nbr2").value;
    var num3 = document.getElementById("nbr3").value;
    
    var result= parseInt(num1) + parseInt(num2) + parseInt(num3);

    document.write("L'addition des chiffres ,"+num1+" ,"+num2+" et "+num3+ " est "+result);
}
function afficher() {
    document.write("<table><tr><td>num1</td><td>num2</td><td>num3</td></tr></table>");
}
function effacer() {
    document.getElementById("nbr1").value="";
    document.getElementById("nbr2").value="";
    document.getElementById("nbr3").value="";

}
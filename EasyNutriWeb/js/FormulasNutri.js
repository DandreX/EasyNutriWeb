var calcMetabolismoBasal = function (peso, altura, sexo, idade) {
    var res;
    altura = altura * 100;
    console.log(peso, altura, sexo, idade);
    if (sexo == 'M') {
        res = 66 + 13.7 * peso + 5 * altura - 6.8 * idade;
    } else if (sexo == 'F') {
        res = 655 + 9.5 * peso + 1.8 * altura - 4.7 * idade;
    }
    return res;
}

var calcIMC = function (peso, altura) {
    var imc = peso / (altura * altura);
    return imc;
};

var calcIMCCat = function (imc, idade) {
    var catIMC = "";
    if (idade < 65) {
        if (imc < 18.5) {
            catIMC = "Baixo Peso";
        } else if (imc < 24.9) {
            catIMC = "Peso Normal";
        } else if (imc < 29.9) {
            catIMC = "Pré-obesidade";
        } else if (imc < 34.9) {
            catIMC = "Obesidade (Classe I)";
        } else if (imc < 39.9) {
            catIMC = "Obesidade (Classe II)";
        } else {
            catIMC = "Obesidade (Classe III)";
        }
    } else{
        if(imc < 22){
            catIMC = "Desnutrição";
        } else if(imc < 27){
            catIMC = "Eutrofia";
        } else{
            catIMC = "Obesidade";
        }
    }
    return catIMC;
}


var calcPesoRef = function (altura, sexo, idade) {
    altura = altura * 100;
    var factorSexo = (sexo == 'M') ? 0 : 0.05;
    var idadeAjustada = (idade > 45) ? 45 : idade;
    var res = (50 + 0.75 * (altura - 150) + 0.8 * (altura - 100 + idadeAjustada / 2)) / 2;
    return res = res - res * factorSexo;
}

var calcPesoAjust = function (peso, pesoRef, imcVal) {
    var res = 0;
    if (imcVal > 30) {
        res = ((peso - pesoRef) * 0.25) + pesoRef;

    } else if (imcVal < 18) {
        res = ((pesoRef - peso) * 0.25);
        res = res + peso;
    }
    return res;
}
var actividades = {
    1: {
        "M": 1,
        "F": 1},
    2: {
        "M": 1.11,
        "F": 1.12},
    3: {
        "M": 1.25,
        "F": 1.27},
    4: {
        "M": 1.48,
        "F": 1.45}
};
var calcNeds = function (peso, altura, sexo, idade, actividade) {
    console.log(actividades, actividade);
    if (typeof actividades[actividade] == 'undefined') {
        return 0;
    }
    var pa = actividades[actividade][sexo];
    console.log(pa);
    var res = 0;
    if (sexo == "M") {
        console.log("calc neds para M, pa:" + pa);
        res = 662 - 9.53 - idade + pa * (15.91 * peso + 539.6 * altura);
    } else if (sexo == "F") {
        console.log("calc neds para F, pa:" + pa);
        res = 354 - 6.91 - idade + pa * (9.36 * peso + 726 * altura);
    }

    return res;
}
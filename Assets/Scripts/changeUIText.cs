using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;

public class changeUIText : MonoBehaviour
{

    [SerializeField] private TextMeshProUGUI instructionText;

    int activeText;

    public void noneText() {
        setNewText("");
    }

    public void setNewText(string newText) {
        instructionText.text = newText;
    }

    public void introduction() {
        setNewText("Nesse experimento você verá uma chama mudar de cor.\n \n" + 
        "Primeiramente pegue e ascenda a vela com o isqueiro.");
        activeText = 1;
    }
    
    public void secondText() {
        setNewText("Agora volte ao balcão com a vela");
        activeText = 2;
    }

    public void conclusionText() {
        setNewText("Cada sal emite uma coloração diferente ao ser colocado em contato com a chama. Para entendermos por que isso ocorre, relembremos rapidamente do que se trata o modelo atômico de Rutherford-Böhr: \n \n" + 

        "Segundo Böhr, o átomo teria uma eletrosfera composta de camadas energéticas (ou níveis de energia), que conteriam apenas os elétrons que tivessem a energia respectiva de cada nível. Isso significa que só seriam permitidas algumas órbitas circulares ao elétron, sendo que em cada uma dessas órbitas o elétron apresenta energia constante. Para passar para um estado de maior energia, o elétron precisa receber energia de alguma fonte externa; assim, quando isso ocorre, o elétron salta para uma órbita ligeiramente mais afastada do núcleo, ficando em seu estado excitado. \n \n" + 

        "No momento em que colocamos o sal no fogo, estamos fornecendo energia para seus elétrons. No entanto, o estado excitado é instável, portanto, os elétrons que “saltaram” de nível retornam à órbita de seu estado estacionário. Nesse momento, o elétron perde (na forma de onda eletromagnética, ou seja, na forma de luz) uma quantidade de energia que corresponde à diferença de energia existente entre as órbitas envolvidas no movimento do elétron.\n\n" + 

        "Como cada sal apresenta elementos diferentes, com átomos que têm níveis de energia também de valores diferentes, a luz emitida por cada um dos sais será em um comprimento de onda bem característico de cada um.\n\n" + 
        
        "Encoste no notebook para visualizar um vídeo explicativo do experimento");
        activeText = 3;
    }


    public void scannerSulfato() {
        setNewText("Sulfato de Cobre (II) ou Sulfato Cúprico é um composto químico com fórmula molecular CuSO4. Este sal existe sob algumas formas, que se diferem por seu grau de hidratação. \n" + 
        "Na sua forma anidra ele se apresenta como um pó de coloração verde opaca ou cinzento, enquanto na sua forma penta-hidratada (CuSO4.5H2O), a forma no qual é mais encontrado, ele é azul brilhante");
    }

    public void scannerCloreto() {
        setNewText("Cloreto de estrôncio (SrCl2) é um sal de estrôncio e cloro. É iônico e solúvel em água. \n" +
        "É menos tóxico que o cloreto de bário, mas é mais tóxico que o cloreto de cálcio. \n Emite um brilho vermelho quando aquecido em uma chama");
    }

    public void scannerLighter() {
        setNewText("Isqueiro (anteriormente chamado de lâmpada de Döbereiner) é um dispositivo portátil usado para gerar fogo, patenteado em 1823 pelo químico alemão Johann Wolfgang Döbereiner, baseado na pederneira.");
    }

    public void setActiveText() {
        if(activeText == 1) {
            introduction();
        } else if (activeText == 2) {
            secondText();
        } else if (activeText == 3) {
            conclusionText();
        }
    }
}

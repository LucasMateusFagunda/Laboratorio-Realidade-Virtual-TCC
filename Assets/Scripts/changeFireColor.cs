using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[RequireComponent(typeof(ParticleSystem))]

public class changeFireColor : MonoBehaviour
{   
    
    public GameObject fire;
    public GameObject sparks;

    public GameObject sulfato;
    public GameObject cloreto;

    private Color color;
    private ParticleSystem psSelf;
    private ParticleSystem psFire;
    private ParticleSystem psSpark;
    // Start is called before the first frame update
    void Start()
    {
        psSelf = GetComponent<ParticleSystem>();
        psFire = fire.GetComponent<ParticleSystem>();
        psSpark = sparks.GetComponent<ParticleSystem>();
        
    }

    // Update is called once per frame
    void Update()
    {
        
        
    }

    //Verifica com que objeto o fogo est� colodindo e troca a cor do fogo para a respectiva cor que reage ao elemento
    private void OnTriggerEnter(Collider other) {
        if(other.gameObject.tag == "sulfato") {
            changeColor(green());
            //other.gameObject.transform.position = new Vector3(0, 0, 0);
            Destroy(other.gameObject);
            Instantiate(sulfato);
            GameObject.Find("UI").GetComponent<changeUIText>().conclusionText();

        }
        if(other.gameObject.tag == "cloreto") {
            changeColor(red());
            Destroy(other.gameObject);
            Instantiate(cloreto);
            GameObject.Find("UI").GetComponent<changeUIText>().conclusionText();

        }
    }

    //muda a cor do fogo
    private void changeColor(Color cor) {
        var mainSelf = psSelf.main;
        var mainFire = psFire.main;
        var mainSpark = psSpark.main;
        mainSelf.startColor = new Color(cor.r, cor.g, cor.b, .5f);
        mainFire.startColor = new Color(cor.r, cor.g, cor.b, .5f);
        mainSpark.startColor = new Color(cor.r, cor.g, cor.b, .5f);
    }

    //retorna a cor verde
    private Color green(){
        color.r = 0;
        color.g = 1;
        color.b = 0;
        return color;
    }

    //retorna a cor vermelha
    private Color red(){
        color.r = 1;
        color.g = 0;
        color.b = 0;
        return color;
    }
}

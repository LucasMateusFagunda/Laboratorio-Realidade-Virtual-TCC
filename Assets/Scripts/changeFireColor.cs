using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[RequireComponent(typeof(ParticleSystem))]

public class changeFireColor : MonoBehaviour
{   
    private Color color;
    public GameObject fire;
    public GameObject sparks;

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

    private void OnTriggerEnter(Collider other) {
        if(other.gameObject.tag == "sulfato") {
            changeColor(green());
            Destroy(other.gameObject);
        }
        if(other.gameObject.tag == "cloreto") {
            changeColor(red());
            Destroy(other.gameObject);
        }
    }

    private void changeColor(Color cor) {
        var mainSelf = psSelf.main;
        var mainFire = psFire.main;
        var mainSpark = psSpark.main;
        mainSelf.startColor = new Color(cor.r, cor.g, cor.b, .5f);
        mainFire.startColor = new Color(cor.r, cor.g, cor.b, .5f);
        mainSpark.startColor = new Color(cor.r, cor.g, cor.b, .5f);
    }

    private Color green(){
        color.r = 0;
        color.g = 1;
        color.b = 0;
        return color;
    }

    private Color red(){
        color.r = 1;
        color.g = 0;
        color.b = 0;
        return color;
    }
}

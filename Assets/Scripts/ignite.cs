using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ignite : MonoBehaviour
{

    public GameObject fire;

    private GameObject tutorialUI;

    // Start is called before the first frame update
    void Start()
    {
        GameObject.Find("UI").GetComponent<changeUIText>().introduction();
    }


    private void OnTriggerEnter(Collider other) {
        if(other.gameObject.tag == "lighter") {
            fire.SetActive(true);
            Destroy(GetComponent<CapsuleCollider>());
            GameObject.Find("UI").GetComponent<changeUIText>().secondText();
        }
        
    }

    

}

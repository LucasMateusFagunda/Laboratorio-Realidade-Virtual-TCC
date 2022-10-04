using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;


public class scanner : MonoBehaviour
{   

    [SerializeField] private TextMeshProUGUI notebookText;

    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    private void OnTriggerEnter(Collider other) {
        if (other.gameObject.tag == "sulfato") {
            GameObject.Find("UI").GetComponent<changeUIText>().scannerSulfato();
        }

        if (other.gameObject.tag == "cloreto") {
            GameObject.Find("UI").GetComponent<changeUIText>().scannerCloreto();
        }

        if (other.gameObject.tag == "lighter") {
            GameObject.Find("UI").GetComponent<changeUIText>().scannerLighter();
        }

    }

    private void OnTriggerExit(Collider other) {
        GameObject.Find("UI").GetComponent<changeUIText>().setActiveText();
    }

    public void setNewText(string newText) {
        notebookText.text = newText;
    }

}

using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;

public class changeUIText : MonoBehaviour
{

    [SerializeField] private TextMeshProUGUI instructionText;

    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    public void setNewText(string newText) {
        instructionText.text = newText;
    }

    public void introduction() {
        setNewText("kkkk");
    }

    public void teste() {
        print("oi");
    }

    
}

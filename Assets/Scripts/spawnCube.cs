using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class spawnCube : MonoBehaviour
{
    
    public GameObject cubo;

    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    public void OnTriggerEnter(Collider other) {
        if(other.gameObject.tag == "blocoTeste") {
            print("deu certo");
            Instantiate(cubo, new Vector3(0, 3, 1), Quaternion.identity);
            Destroy(other.gameObject);
        } else {
            print("quase");
        }
    }
}

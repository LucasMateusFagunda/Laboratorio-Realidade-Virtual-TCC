using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class lookAtCamera : MonoBehaviour
{


    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        transform.LookAt(new Vector3(GameObject.Find("Main Camera").GetComponent<Camera>().transform.position.x, GameObject.Find("Main Camera").GetComponent<Camera>().transform.position.y, GameObject.Find("Main Camera").GetComponent<Camera>().transform.position.z));
        transform.forward *= -1;
    }
}

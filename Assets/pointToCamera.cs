using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class pointToCamera : MonoBehaviour
{
    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        transform.LookAt(new Vector3(2, 2, 2));
    }
}

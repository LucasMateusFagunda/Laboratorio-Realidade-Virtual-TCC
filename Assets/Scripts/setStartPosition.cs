using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class setStartPosition : MonoBehaviour
{

    public Vector3 startPosition;

    // Start is called before the first frame update
    void Start()
    {
        transform.position = new Vector3(startPosition.x, startPosition.y, startPosition.z);
    }

    // Update is called once per frame
    void Update()
    {
        
    }
}

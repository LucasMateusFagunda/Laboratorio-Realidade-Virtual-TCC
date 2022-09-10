using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class lookAtCamera : MonoBehaviour
{

    private GameObject camera;

    // Start is called before the first frame update
    void Start()
    {
        camera = GameObject.Find("Main Camera");
    }

    // Update is called once per frame
    void Update()
    {
        transform.LookAt(new Vector3(camera.transform.position.x, camera.transform.position.y, camera.transform.position.z));
        transform.forward *= -1;
    }
}

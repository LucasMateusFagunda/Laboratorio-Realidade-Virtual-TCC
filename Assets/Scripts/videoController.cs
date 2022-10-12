using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class videoController : MonoBehaviour
{

    public GameObject videoTexture;
    public GameObject videoPlayer;

    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    public void enableVideo() {
        videoPlayer.SetActive(true);
        videoTexture.SetActive(true);
    }

    public void disableVideo() {
        videoPlayer.SetActive(false);
        videoTexture.SetActive(false);
    }
}

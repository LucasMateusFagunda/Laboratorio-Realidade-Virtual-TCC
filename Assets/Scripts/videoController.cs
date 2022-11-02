using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class videoController : MonoBehaviour
{

    public GameObject videoTexture;
    public GameObject videoPlayer;
    private bool videoPlaying;

    // Start is called before the first frame update
    void Start()
    {
        videoPlaying = false;
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    private void OnTriggerEnter(Collider other) {
        if (other.gameObject.tag == "hand" & !videoPlaying) {
            enableVideo();
            videoPlaying = true;
        } 
        else {
            disableVideo();
            videoPlaying = false;
        }
        print("teste");
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

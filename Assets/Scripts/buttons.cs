using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class buttons : MonoBehaviour
{

    public GameObject fireExperiment;

    public GameObject UI;

    public GameObject fireButton;
    public GameObject clockButton;
    public GameObject exitButton;

    private void OnTriggerEnter(Collider other)
    {
        if (gameObject.tag == "fireButton" & other.gameObject.tag == "hand")
        {
            fireExperiment.SetActive(true);

            UI.SetActive(false);

            fireButton.SetActive(false);
            clockButton.SetActive(false);
            exitButton.SetActive(true);
        }

        if (gameObject.tag == "clockButton" & other.gameObject.tag == "hand")
        {
            print("iodo");

            UI.SetActive(false);

            fireButton.SetActive(false);
            clockButton.SetActive(false);
            exitButton.SetActive(true);
        }

        if (gameObject.tag == "exitButton" & other.gameObject.tag == "hand")
        {
            fireExperiment.SetActive(false);

            UI.SetActive(true);

            fireButton.SetActive(true);
            clockButton.SetActive(true);
            exitButton.SetActive(false);
        }
    }

}

using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class ChangeScenes : MonoBehaviour
{
    [SerializeField]
    string SceneName = "";


    // Update is called once per frame
    void Update()
    {
        if (Input.GetMouseButton(0))
            if (!string.IsNullOrEmpty(SceneName))
                SceneManager.LoadScene(SceneName);

        if (Input.GetKeyDown(KeyCode.Escape)) //jest to zmapowane z nacisnieciem przycisku wstecz na telefonach
            Application.Quit();
    }
}

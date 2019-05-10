using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class MenuUserInterface : MonoBehaviour
{
    [SerializeField]
    Numbers LastGameScore;

    [SerializeField]
    Numbers RecordScore;






    // Start is called before the first frame update
    void Start()
    {
        LastGameScore.Value = PlayerPrefs.GetInt(PlayerPrefsConst.LastGameScore, 0);
        RecordScore.Value = PlayerPrefs.GetInt(PlayerPrefsConst.RecordScore, 0);
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    public void LoadGame()
    {
        FindObjectOfType<SceneChanger>().ChangeScene(SceneNames.Game);
    }
}

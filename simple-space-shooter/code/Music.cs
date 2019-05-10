using System.Collections;
using System.Collections.Generic;
using UnityEngine;

[RequireComponent(typeof(AudioSource))]
public class Music : MonoBehaviour
{
    // Start is called before the first frame update
    void Start()
    {
        if (FindObjectsOfType<Music>().Length> 1)
            Destroy(gameObject);

        DontDestroyOnLoad(gameObject); //muzyka w tle ma sie nie wylaczac podczas zmieniania scen
    }
}

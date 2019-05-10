
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class AsteroidSpawner : MonoBehaviour
{
    [SerializeField]
    AsteroidType[] AsteroidTypes;

    [SerializeField]
    GameObject AsteroidPrefab;

    [SerializeField]
    float AsteroidSpawningTime = 2f;

    public bool Spawning = true;
    public int AsteroidTypeLevel { get; set; }
    public int AsteroidTypeRange { get; set; }

    // Start is called before the first frame update
    void Start()
    {
        AsteroidTypeLevel = 0;
        AsteroidTypeRange = 8;
        StartCoroutine(SpawningCoroutine());
    }

   IEnumerator SpawningCoroutine()
    {
        while(true)
        {
            while(Spawning)
            {
                SpawnAsteroid();
                yield return new WaitForSeconds(AsteroidSpawningTime); //kazda kolejna asteroida jest tworzona co AsteroidSpawningTime
            }

            yield return new WaitForEndOfFrame(); //po wyjsciu z wewnetrznej petli odciazamy procesor i czekamy do nowej klatki
        }
    }

    private void SpawnAsteroid()
    {
        var obj = Instantiate(AsteroidPrefab, transform.position, Quaternion.identity);
        obj.transform.position += Vector3.right * Random.Range(-2f, 2f);

        var asteroidType = GetRandomAsteroidType();
        obj.GetComponent<Asteroid>().Configure(asteroidType);
    }

    private AsteroidType GetRandomAsteroidType()
    {
        int index = AsteroidTypeLevel + Random.Range(-AsteroidTypeRange/2, AsteroidTypeRange);
        index = Mathf.Clamp(index, 0, AsteroidTypes.Length - 1);
        return AsteroidTypes[index];
    }
}

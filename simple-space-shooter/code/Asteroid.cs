
using System.Collections;
using System.Collections.Generic;
using UnityEngine;


[System.Serializable]
public class AsteroidType
{
    public Sprite Sprite;
    public float Durability = 5f;
    public int Points = 10;
}

[RequireComponent(typeof(Rigidbody2D))]
[RequireComponent(typeof(Collider2D))]
[RequireComponent(typeof(SpriteRenderer))]
public class Asteroid : MonoBehaviour
{
    [SerializeField]
    float Durability = 6f;

    [SerializeField]
    GameObject DestroyingParticles;

    [SerializeField]
    GameObject DestroyedParticles;

    private SpriteRenderer SpriteRenderer;
    private int Points;

    // Start is called before the first frame update
    void Awake()
    {
        SetSpeed();
        SpriteRenderer = GetComponent<SpriteRenderer>();
    }

    private void SetSpeed()
    {
        var targetSpeed = Random.Range(2f, 3f);
        GetComponent<Rigidbody2D>().velocity = Vector2.down * targetSpeed;
    }

    private void OnTriggerEnter2D(Collider2D collision)
    {
        var obj = collision.gameObject;
        var bullet = obj.GetComponent<Bullet>();

        if (bullet != null)
        {
            GenerateParticles(DestroyingParticles, collision.transform.position);
            DecreaseDurability(bullet.Power);
            Destroy(obj); //zniszczenie pocisku
        }
    }

    private void DecreaseDurability(float amount)
    {
        Durability -= amount;
        if (Durability <= 0)
        {
            GenerateParticles(DestroyedParticles, transform.position);
            FindObjectOfType<GameManager>().Money += Points;
            Destroy(gameObject); //zniszczenie asteroidy
        }
           
    }

    public void Configure(AsteroidType asteroidType)
    {
        SpriteRenderer.sprite = asteroidType.Sprite;

        Durability = asteroidType.Durability;
        Points = asteroidType.Points;
    }

    private void GenerateParticles(GameObject prefab, Vector3 position)
    {
        var particles = Instantiate(prefab, position, Quaternion.identity); //staly obrot
        particles.GetComponent<ParticleSystemRenderer>().material.mainTexture = SpriteRenderer.sprite.texture;
    }
}

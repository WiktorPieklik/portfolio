using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ShipMovement : MonoBehaviour
{
    [SerializeField]
    Vector2 MovementArea;

    Camera Camera; //kamera jest potrzebna do uzyskania pozycji klikniec na ekranie

    // Start is called before the first frame update
    void Start()
    {
        Camera = FindObjectOfType<Camera>();
    }

    private void OnDrawGizmos()
    {
        Gizmos.DrawWireCube(Vector3.zero, MovementArea * 2f); //narysowanie zakresu poruszania sie statku
                                                         //rysuje prostopadloscian o srodku i jakiejs wielkosci
    }
    // Update is called once per frame
    void Update()
    {
         var targetPosition = (Vector2)Camera.ScreenToWorldPoint(Input.mousePosition); //punkt polozenia myszy (ekranowy) jest konwertowany na polozenie swiata 3d

        //var targetPosition = Input.acceleration;
        targetPosition.x = Mathf.Clamp(targetPosition.x, -MovementArea.x, MovementArea.x); //ogranicza zakres poruszania sie statku
        targetPosition.y = Mathf.Clamp(targetPosition.y, -MovementArea.y, MovementArea.y);

        transform.position = Vector3.Lerp(transform.position, targetPosition, Time.deltaTime * 5f ); //pozycja obiektu, do ktorego bedzie przypisany skrypt, jest uaktualniana 
                            //bez konwersji, obiekt jest na wysokosci (kordynata z) kamery i go nie widac
    }
}

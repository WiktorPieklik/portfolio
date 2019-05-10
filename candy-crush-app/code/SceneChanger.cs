using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

[RequireComponent(typeof(Canvas))]
public class SceneChanger : MonoBehaviour
{
    [SerializeField]
    float FadeDuration = 1f;

    Image Blend;

    // Start is called before the first frame update
    void Start()
    {
        Blend = CreateBlend();
        StartCoroutine(FadeInCoroutine());
    }

    Image CreateBlend()
    {
        var obj = new GameObject();
        obj.transform.parent = transform;

        var rectTransform = obj.AddComponent<RectTransform>();
        rectTransform.anchorMin = Vector2.zero;
        rectTransform.anchorMax = Vector2.one;
        rectTransform.anchoredPosition = Vector2.zero;
        rectTransform.sizeDelta = Vector2.zero;

        obj.AddComponent<CanvasRenderer>();

        var image = obj.AddComponent<Image>();
        image.color = Color.white;
       

        obj.SetActive(false);

        return image;
    }

    public void ChangeScene(string name)
    {
        StartCoroutine(FadeOutCoroutine(name));
    }

    IEnumerator FadeInCoroutine()
    {
        Blend.gameObject.SetActive(true);
        while(Blend.color.a > 0f)
        {
            Blend.color -= new Color(0f, 0f, 0f, 1f) / FadeDuration * Time.deltaTime;
            yield return new WaitForEndOfFrame();
        }

        Blend.gameObject.SetActive(false);
    }

    IEnumerator FadeOutCoroutine(string sceneName)
    {
        Blend.gameObject.SetActive(true);
        while (Blend.color.a <= 1f)
        {
            Blend.color += new Color(0f, 0f, 0f, 1f) / FadeDuration * Time.deltaTime;
            yield return new WaitForEndOfFrame();
        }

        Blend.gameObject.SetActive(false);
        SceneManager.LoadScene(sceneName);
    }
}

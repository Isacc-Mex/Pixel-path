# PixelPath

PixelPath es una plataforma de autoayuda con temática de videojuegos y estética pixel art, diseñada para brindar apoyo emocional y mental a los jugadores mediante minijuegos, consejos y un sistema de inteligencia artificial que personaliza la experiencia del usuario.

## Objetivos

- Brindar una plataforma de autoayuda accesible y atractiva para los jugadores.
- Utilizar la estética pixel art para crear un entorno amigable y acogedor.
- Integrar inteligencia artificial para personalizar la experiencia y proporcionar ayuda específica basada en datos.

## Alcances

- **Pantalla de Carga Interactiva:** Al acceder a PixelPath, los usuarios son recibidos con una pantalla de bienvenida que incluye un personaje pixelado y un fondo temático. Esta pantalla no solo sirve de introducción visual, sino que también ofrece un mensaje de bienvenida y actúa como una transición hacia la página principal.
  
- **Página Principal Personalizada:** La página principal cuenta con un diseño centrado en la usabilidad y la estética. Incluye un personaje interactivo en la esquina inferior derecha, rotado como un espejo, y un menú de navegación tipo hamburguesa con opciones como "Mi Perfil", "Consejos", "Jardín", "Sueños", "Metas" y "Mis Gustos". En el centro de la página se encuentran varios contenedores donde aparecen minijuegos y consejos para ayudar al usuario.

- **Minijuegos y Consejos:** Se integran diversos minijuegos que no solo entretienen, sino que también recopilan datos sobre los puntos de interés, dificultades y preferencias de los usuarios. Además, hay una sección de consejos donde el personaje interactivo proporciona recomendaciones aleatorias para mejorar el bienestar del usuario.

- **Jardín Virtual:** Un espacio personalizado donde los usuarios pueden interactuar y cuidar de su propio jardín virtual. Este jardín sirve como una metáfora del crecimiento personal y permite a los usuarios reflejar su progreso y bienestar.

- **Análisis de Datos mediante IA:** Los datos recopilados a través de los minijuegos son analizados por un sistema de inteligencia artificial para crear perfiles personalizados. Este análisis ayuda a detectar y abordar problemas de estrés, ansiedad, depresión, y otros, proporcionando recomendaciones específicas basadas en el comportamiento y las necesidades del usuario.

- **Comunidad en Línea:** Un espacio donde los usuarios pueden compartir sus experiencias, consejos y motivaciones. Esta comunidad actúa como una red de apoyo adicional, fomentando la interacción positiva entre los usuarios.

## Tipo de Mercado

PixelPath está dirigido principalmente a jugadores de videojuegos que buscan mejorar su bienestar emocional y mental. El mercado incluye tanto a jugadores casuales como a aquellos que dedican mucho tiempo a esta actividad.

## Potencial

El proyecto tiene un gran potencial debido al creciente interés en la salud mental y emocional, especialmente dentro de la comunidad de jugadores. La combinación de autoayuda y tecnología de inteligencia artificial lo hace único y relevante.

## Justificación

PixelPath busca llenar el vacío existente en recursos de autoayuda específicamente diseñados para jugadores. Utilizando una estética atractiva y funcionalidades personalizadas, el proyecto pretende ofrecer un apoyo efectivo y accesible, mejorando la calidad de vida de sus usuarios.

## Requerimientos Funcionales

1. **Pantalla de Carga:**
   - Mostrar un personaje pixelado y un fondo temático al cargar la página.
   - Proporcionar un mensaje de bienvenida.

2. **Página Principal:**
   - Incluir un personaje interactivo en la esquina inferior derecha.
   - Menú de navegación tipo hamburguesa con opciones: "Mi Perfil", "Consejos", "Jardín", "Sueños", "Metas" y "Mis Gustos".
   - Mostrar contenedores con minijuegos y consejos.

3. **Minijuegos y Consejos:**
   - Integrar minijuegos que recopilen datos de usuario.
   - Proporcionar consejos aleatorios a través del personaje interactivo.

4. **Jardín Virtual:**
   - Permitir a los usuarios interactuar y cuidar de un jardín virtual.

5. **Análisis de Datos:**
   - Analizar datos de minijuegos con IA para personalizar la experiencia del usuario.

6. **Comunidad en Línea:**
   - Crear un espacio donde los usuarios puedan compartir experiencias y consejos.

## Requerimientos No Funcionales

1. **Usabilidad:**
   - Interfaz intuitiva y fácil de navegar.
   - Diseño atractivo y coherente con la temática pixel art.

2. **Rendimiento:**
   - Tiempo de carga de la página reducido.
   - Respuesta rápida a las interacciones del usuario.

3. **Seguridad:**
   - Protección de datos personales de los usuarios.
   - Implementación de medidas contra accesos no autorizados.

4. **Compatibilidad:**
   - Compatible con los navegadores web más comunes.
   - Adaptabilidad a diferentes dispositivos y tamaños de pantalla.

5. **Mantenimiento:**
   - Código modular y documentado para facilitar futuras actualizaciones.
   - Soporte y resolución de problemas técnicos.

## Diagrama de Contexto

```mermaid
graph TB
    Usuario((Usuario)) -->|Accede a| PantallaCarga[<center>Pantalla de Carga</center>]
    PantallaCarga -->|Redirige a| PaginaPrincipal[<center>Página Principal</center>]
    PaginaPrincipal -->|Navega a| MiPerfil[<center>Mi Perfil</center>]
    PaginaPrincipal -->|Navega a| Consejos[<center>Consejos</center>]
    PaginaPrincipal -->|Navega a| Jardin[<center>Jardín</center>]
    PaginaPrincipal -->|Navega a| Suenos[<center>Sueños</center>]
    PaginaPrincipal -->|Navega a| Metas[<center>Metas</center>]
    PaginaPrincipal -->|Navega a| MisGustos[<center>Mis Gustos</center>]
    PaginaPrincipal -->|Interacción| Personaje[<center>Personaje Interactivo</center>]
    MiPerfil -->|Regresa a| PaginaPrincipal
    Consejos -->|Regresa a| PaginaPrincipal
    Jardin -->|Regresa a| PaginaPrincipal
    Suenos -->|Regresa a| PaginaPrincipal
    Metas -->|Regresa a| PaginaPrincipal
    MisGustos -->|Regresa a| PaginaPrincipal
    Personaje -->|Proporciona consejos| Usuario
    Personaje -->|Proporciona consejos| Consejos
    PaginaPrincipal -->|Navega a| Minijuegos[<center>Minijuegos</center>]
    Minijuegos -->|Recolecta datos| AnalisisDatos[<center>Análisis de Datos</center>]
    AnalisisDatos -->|Genera recomendaciones| PaginaPrincipal


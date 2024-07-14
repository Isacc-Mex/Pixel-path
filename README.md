# Pixel-path
proyecto en desarrolló de una página de autoayudo con diseño pixel

# PixelPath

## Objetivo
PixelPath es una plataforma de autoayuda para jugadores que combina la temática de videojuegos con herramientas para mejorar el bienestar emocional. A través de minijuegos y un personaje interactivo, los usuarios reciben consejos personalizados y pueden trabajar en sus metas y sueños.

## Planteamiento del problema
Muchos jugadores pasan largas horas frente a las pantallas sin considerar los efectos en su bienestar emocional y físico. PixelPath busca equilibrar el tiempo de juego con consejos y herramientas de autoayuda, promoviendo hábitos saludables y la autoconciencia.

## Justificación
PixelPath utiliza una estética de pixel art y elementos interactivos para atraer a los jugadores, proporcionando una experiencia única y atractiva. La plataforma no solo ofrece entretenimiento, sino también soporte emocional a través de un enfoque personalizado, utilizando datos recolectados de los minijuegos y análisis de IA.

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
    PaginaPrincipal -->|Accede a| Minijuegos[<center>Minijuegos</center>]
    MiPerfil -->|Regresa a| PaginaPrincipal
    Consejos -->|Regresa a| PaginaPrincipal
    Jardin -->|Regresa a| PaginaPrincipal
    Suenos -->|Regresa a| PaginaPrincipal
    Metas -->|Regresa a| PaginaPrincipal
    MisGustos -->|Regresa a| PaginaPrincipal
    Minijuegos -->|Regresa a| PaginaPrincipal
    Personaje -->|Proporciona consejos| Usuario
    Personaje -->|Proporciona consejos| Consejos
    Minijuegos -->|Recolecta datos| AnalisisDatos[<center>Análisis de Datos</center>]
    AnalisisDatos -->|Proporciona perfil personalizado| Usuario
    AnalisisDatos -->|Proporciona perfil personalizado| PaginaPrincipal

<p align="center">
<a href="https://www.anasty.icu" target="_blank">
<img src="https://i.imgur.com/pTRsG6M.png" width="350" alt="Prueba técnica Digitalife">
</a>
</p>
<p align="center">
<a href="https://github.com/SergioAnastacio/sa-api-test/actions/workflows/main.yml">
<img src="https://github.com/SergioAnastacio/sa-api-test/actions/workflows/main.yml/badge.svg" alt="Build Status"></a>
<br></br>
<a href="http://api.anasty.icu/api/up" target="_blank"><img alt="website" src="https://img.shields.io/website?url=http%3A%2F%2Fapi.anasty.icu%2Fapi%2Fup&up_message=API%20UP&down_message=API%20DOWN&style=flat"></a>

</p>

# SA-API-TEST

## Introducion
Parte **Backend** del proyecto de un sistema de administracion de inventarios enlinea , desarollado en PHP con el framework de Laravel aplicando tecnicas como por ejemplo :

- Autenticacion de usuarios asincrono
  - Usando un endpoint personalizado para los accesos
- Payload Compression
  - Middleware usando Gzip relacion 3:1
- Paginacion de los datos 
  - Respuestas al usuario mas rapidas
- Cache con redis
  - Cache read-through para mejoras las lecturas 10:1
- Colas de procesamiento
  - Uso de jobs para el procesamiento asincrono

Podemos adecuar e integrar esta api facilmente en una arquitectura de microservicios como "Product Service" y escalar el servicio para que satisfaga la demanda.

### Que hace el proyecto?
Recive las peticiones de un **FrontEnd**  procesa la peticion y retorna con un mensaje al usuario. tiene a su disposicion una serie de endpoints para su uso

* **Publico**
  * GET Api/up : Endpoint para verificar el estado de la app
  * POST /login : Endpoint de autenticacion , usa la autenticacion por defecto de larabel 
* **Privado**
  * GET /user : Enpoint que acepta un token y responde con la infromacion del usuario 
  * ApiResource /products : Endpoint que permite Operaciones CRUD   
### Inicio rapido

1. **Clonar el repositorio**:

    - Si no tienes el CLI de Github instalado:
    ```bash
        git clone https://github.com/SergioAnastacio/sa-api-test.git
    ```
    - Si tienes el CLI
    ```bash
        gh repo clone SergioAnastacio/sa-api-test
    ```
2. **Configuracion**:
    - 💡 **TIP:** Recomiendo usar docker por su facilidad.
    - 😎 **MacOS pendiente** Instruciones de de MacOS pendiente

- WINDOWS DOCKER
  - Habilitar la Virtualizacion
    - Entra a la bios  y busca la configuracion de virtualizacion (Es diferente en cada placa madre)
    - Habilita la virtualizacion cambiando el parametro de false a true 
    - Guarda los cambios en la bios e inicia normalmente el sistema.
  - Instalar WSL2
    - Abre Powershell como administrador y habilita el subsitema de linux (WSL) 
    ```admin powershell
        dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart
    ```
    - Abre Powershell como administrador y habilita la plataforma de maquina virtual
    ```Admin Powershell
        dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all /norestart
    ```
    - Reinicia el sistema.
    - Decarga el paquete de actualizacion de Kernel de linux:
        - Puedes ver el repositorio de WSL2 en github y descargar la version mas reciente 
         [WSL2-Linux-Kernel Repo](https://github.com/microsoft/WSL2-Linux-Kernel)
        - O descargar la version x64:
         [Descarga WSL2 x64](https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_x64.msi) 
    - Abre Powershell como administrador y configura WSL2 Como default
    ```Admin Powershell
       wsl --set-default-version 2 
    ```
    - Descargar e instalar una distro de linux  Recordar usuario y contrase;a creados
      - Version Invoke-WebRequest
        - Abre Powershell como administrador
        ```Admin Powershell
          Invoke-WebRequest -Uri https://aka.ms/wslubuntu2004 -OutFile Ubuntu.appx -UseBasicParsing
        ```
        - Instalar la distro directamente
        ```Powershell
          Add-AppxPackage .\Ubuntu.appx
        ```
      - Version wsl
        - Abre Powershell como administrador para listar las distribuciones disponibles
        ```Admin Powershell
            Wsl -l -o
        ```
        - Instala la distribucion de tu preferencia Recomiendo descargar Ubuntu
        ```Admin Powershell
            wsl --install -d Ubuntu
        ```

    - Iniciar Ubuntu con el comando wsl  en powershell o CMD
    ```powershell
        wsl 
    ```
    - Actualizar Ubuntu 
    ```sh
        sudo apt update && sudo apt upgrade -y
    ```
  - Instalar DockerDesktop
    - Ir a la pagina oficial [Docker](https://www.docker.com/products/docker-desktop/) descargar el insalador de tu sistema.
    - Abrir el instalador y seguir las instruciones
    - Cuando el instalador nos pregunte si queremos instalar componentes pas wsl2 marcamos que si.
    - Una vez instalado el DockerHub  habilitamos la integracion con nuestra distribucion por defecto
      - Configuraciones> Resources> WSL Integration  y marcamos la casilla de "Enable integration with my default WSL distro"
      - Si queremos tener la integracion con diferentes distros  podemo hacerlo manualmente con el slider y el nombre de cada distro dentro de esta ventana de resources.
  - Iniciar contenedor
    - Una vez que tenemos WSl y docker funcionando  iremos al root del proyecto sa-api-test y levantaremos los contendores
      - puedes hacerlo con la linea de comandos dentro de vscode 
      ```bash
        wsl 
      ```
      🥸 **Nota** : el flag de  " -d" indica que queremos realizar la accion en modo detach  que nos permitira ejecutar mas comandos en esa terminal.
      ```bash
        ./vendor/bin/sail up -d
      ```
      De esta forma inicializaremos los contenedores necesarios para el modo desarollo de nuestra app.
  - Parar contendor a la hora de finalizar nuestra session de desarollo
    - Para parar los servicios / contenedores  cuando terminemos nuestra session usa el codigo:
    ```bash
        ./vendor/bin/sail down
    ```
  - Crear un Alias para Sail (Opcional)
    - Abre una terminal con wsl
    ```bash
        wsl
    ```
    - 🥸 **Nota**: el caracter ~ puedes colocarlo con alt+126.  `Puedes abir el archivo con nano si lo prefieres.`
    - 😎 **Protip** : Cuando usamos VI y abrimos un archivo siempre estamos en el modo **Comand** el cual podemos usar para navegar en el archivo (Usamos las flechas del teclado)
        - Para Insertar codigo en el archivo deberemos cambiar al modo **Insert** "i" 
        - Para regresar al modo **Comand** "esc"
        - Para guardar usamos el comando ":w" 
        - Para Guardar y salir usamos el comando ":wq"
        - Para salir del archivo sin guardar  usamos el comando ":q". 
    Abrimos el archivo y navegamos al final del archivo 
    ```bash
       sudo vi ~/.bashrc
    ```
    Cuando lleguemos al final del archivo pressionamos  i en el teclado para entrar en **Insert mode**  damos dos espacios y escribimos el siguiente codigo:
    ```sh
        #Alias fort Sail
        alias sail="./vendor/bin/sail"
    ```
    Cambiamos al modo **Command Mode** , Guardamos los cambios y salimos  con :wq
   
## Tutoreales
### Como crear una coleccion para consultar los endpoints
🥸 **Nota** : Recomiendo el uso de [**Postman**](https://www.postman.com/downloads/) por su organizacion 
|| Puedes usar La extencion de VSCode ThunderClient son muy parecidas. 

  - En postman  En la pesta;a de **Collections** puedes agregar una nueva **Collection REST API basics**
  - Esta opcion creara una collection con una serie de instruciones de como usar la collection. 
  - Iremos a la seccion de Variables dentro de nuestra collection para modificar la variable de `base_url`
  - En la variable `base_url` asignamos el valor de nuestro entrypoint de nuestra api como **INITIAL VALUE**  y **CURRENT VALUE** Por Ejemplo:`https://localhost/api` 
  - Navegamos a la seccion de **Authorization**  selecionamos el tipo de auth como `Bearer Token` y pegamos nuestro token de authenticacion ,  si no lo tenemos  al momento de hacer un login a nuestra api el sistema no lo proporcionara y sera cuestion de copiar el token y guardarlo en esta seccion

### Crear los endpoints de consulta en postman
  - Selecionamos el endpoint de `GET data` presionamos Cntrol+D para duplicarlo
  - Cambiamos de nombre con Cntrol+E y le damos un nombre **Preferentemente relacionado al endpoint** por ejemplo : `Health-Check`
  - Cambiamos la ruta del endpoint que coincida con nuestra ruta de la api `/up` deveria de verse de esta forma en postman `{{base_url}}/up`
  
  Repetimos el proceso para las diferentes rutas y metodos aqui hay una lista de rutas y metodos
  1. GET `/login`
  2. GET `/up`
  3. GET `/user`
  4. GET `/products` usa el metodo index
  5. GET `/products?perpage=2&page=1` usa el metod index pero pagina los resultados
  6. GET `/products/1` usa el metodo show para mostrar solo un registro
  7. POST `/products` usa el metodo storage (Usa un formulario tipo form data con los valores esperados por el enpoint)
  8. PATCH `/products/5` usa el metodo update (Usa un formulario con los valores esperados por el endpiont)
  9. DELETE `/products/5` usa el metodo de destroy para eliminar un registro ( Eliminado logico) 

## Explicacion

### GET products
### GET products by id
### POST products
En este endpoint realiza varias acciones y o

## Como Enviar informacion a los endpoints en especifico
### GET login
- Creacion del Formdata
  - Los campos del form data son de tipo key-value en los que puedes definir como son enviados en el request 
  - key: `email` type:`text` value: `Testing Product`
  - key: `password` type:`text` value: `1200.00`
### GET  products 
`No se requiere enviar nada`
### GET  products pagination
- Creacion del Formdata
  - Los campos del Query params
    - key: `perpage` type:`text` value: `2`
    - key: `page` type:`text` value: `1`
### GET  product by id
Usamos el endpoint de `{{base_url}}/products/1` 
    no se requiere enviar mas datos
### POST products 
- Creacion del Formdata
  - Los campos del form data son de tipo key-value en los que puedes definir como son enviados en el request 
  - key: `name` type:`text` value: `Testing Product`
  - key: `price` type:`text` value: `1200.00`
  - key: `qty` type:`text` value: `10`
  - key: `images[]` type:`file` value: `Selected Files`
  - key: `urls[]` type:`text` value: `http:urlexamble.com`
  - key: `urls[]` type:`text` value: `http:urlexamble.com`
  - key: `urls[]` type:`text` value: `http:urlexamble.com`
  - key: `urls[]` type:`text` value: `http:urlexamble.com`
  - key: `urls[]` type:`text` value: `http:urlexamble.com`

### PATCH products 
- Creacion del Formdata
  - Los campos del form data son de tipo key-value en los que puedes definir como son enviados en el request 
  - key: `name` type:`text` value: `Testing Product`
  - key: `price` type:`text` value: `1200.00`
  - key: `qty` type:`text` value: `10`
  
## Referencias
- [Windows Learn Manual de instalacion de versiones WSL](https://learn.microsoft.com/es-es/windows/wsl/install-manual#step-4---download-the-linux-kernel-update-package)
- [Laravel Doc isntal](https://laravel.com/docs/11.x/installation)
- [Laravel Doc Sail on windows](https://laravel.com/docs/11.x#sail-on-windows)

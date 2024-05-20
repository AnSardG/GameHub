# GameHub

GameHub is a mobile-focused application that leverages the IGDB.com API to display information about a wide range of video games. This project is developed primarily for educational purposes. Initially, the app is designed for mobile use and does not include responsive design for other platforms. Contributions to improve responsiveness and other features are welcome.

Due to limited development time, the app currently has a basic feature set, and the backend code may be disorganized.

## Getting Started

To set up the project, you need to configure the database and API settings. Follow these steps:

1. Rename the example configuration files:
    - `app/models/scripts/database_setup_example.sql` to `database_setup.sql`
    - `config/api_config_example.php` to `api_config.php`

2. Edit the renamed files with your own database credentials and API keys.

## Docker Setup

### Starting the Application

To start the application using Docker, run:
```sh
docker-compose up -d
```

### Stopping the Application

To stop the docker container, run:
```sh
docker-compose down
```

### Rebuilding the project

You need to rebuild the project at least once to ensure all dependencies are correctly installed. To rebuild, run:
```sh
docker-compose up --build -d
```

### Contributing

Contributions are welcome! If you want to add new features, improve the design, or clean up the code, feel free to 
submit a pull request.

### License

This project is licensed under the MIT License. See the LICENSE file for details.

### Contact

For any questions or suggestions, please open an issue on the GitHub repository or 
email me at: antoniosardgonzalez@gmail.com.
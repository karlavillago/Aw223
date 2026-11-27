from app import mysql


# Funcion para consultar todo
def selectAll():
    cursor = mysql.connection.cursor()
    cursor.execute("SELECT * FROM tb_alumnos WHERE state = 1")
    consulta = cursor.fetchall()
    cursor.close()
    return consulta


# Funcion para insertar
def insertEstudiante(nombre, carrera):
    cursor = mysql.connection.cursor()
    cursor.execute(
        "INSERT INTO tb_alumnos(nombre, carrera, state) VALUES (%s, %s, 1)",
        (nombre, carrera)
    )
    mysql.connection.commit()
    cursor.close()


# Funcion para eliminar (Soft Delete)
def softDeleteEstudiante(id):
    cursor = mysql.connection.cursor()
    cursor.execute(
        "UPDATE tb_alumnos SET state = 0 WHERE id = %s AND state = 1",
        (id,)
    )
    mysql.connection.commit()
    cursor.close()


# Funcion para consultar un alumno por ID
def selectById(id):
    cursor = mysql.connection.cursor()
    cursor.execute(
        "SELECT * FROM tb_alumnos WHERE id = %s AND state = 1",
        (id,)
    )
    consulta = cursor.fetchone()
    cursor.close()
    return consulta


# Funcion para actualizar un alumno
def updateEstudiante(id, nombre, carrera):
    cursor = mysql.connection.cursor()
    cursor.execute(
        "UPDATE tb_alumnos SET nombre = %s, carrera = %s WHERE id = %s AND state = 1",
        (nombre, carrera, id)
    )
    mysql.connection.commit()
    cursor.close()
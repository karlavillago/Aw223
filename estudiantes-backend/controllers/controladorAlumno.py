from flask import Blueprint, request, jsonify
from Models.modelEstudiante import *


controladorAlumnoBP= Blueprint('controladorAlumno',__name__)

""" ruta para arranque del servidor """
@controladorAlumnoBP.route('/')
def inicio():
    return "hola soy el backend de alumno"

""" ruta para insert """
@controladorAlumnoBP.route('/guardarAlumno' , methods=['POST'])
def guardar():
    nombreReq= request.form.get('txtNombre','').strip()
    carreraReq= request.form.get('txtCarrera','').strip()

    try:
        insertEstudiante(nombreReq, carreraReq)
        return jsonify({"completado":"estudiante guardado"}),200
    except Exception as e:
        return jsonify({"error": str(e)}),500
    

""" ruta consultar todo """
@controladorAlumnoBP.route('/consultaTodo', methods=['GET'])
def consultatodo():
    try:
        alumnos = selectAll()
        return jsonify(alumnos), 200
    except Exception as e:
        return jsonify({"error": str(e)}), 500


""" ruta para consultar por ID """
@controladorAlumnoBP.route('/consultarAlumnoPorId', methods=['GET'])
def consultarPorId():
    id = request.args.get('id', '').strip()

    try:
        alumno = selectById(id)

        if alumno:
            return jsonify(alumno), 200
        else:
            return jsonify({"mensaje": "alumno no encontrado"}), 404

    except Exception as e:
        return jsonify({"error": str(e)}), 500

""" ruta para actualizar """
@controladorAlumnoBP.route('/actualizarAlumno', methods=['PUT'])
def actualizar():
    id = request.form.get('id', '').strip()
    nombre = request.form.get('txtNombre', '').strip()
    carrera = request.form.get('txtCarrera', '').strip()

    try:
        updateEstudiante(id, nombre, carrera)
        return jsonify({"completado": "estudiante actualizado"}), 200

    except Exception as e:
        return jsonify({"error": str(e)}), 500

""" ruta para eliminar """
@controladorAlumnoBP.route('/eliminarAlumno', methods=['DELETE'])
def eliminar():
    id = request.form.get('id', '').strip()

    try:
        softDeleteEstudiante(id)
        return jsonify({"completado": "se borro el alumno"}), 200

    except Exception as e:
        return jsonify({"error": str(e)}), 500
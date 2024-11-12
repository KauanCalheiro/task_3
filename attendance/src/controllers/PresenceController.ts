import { Request, Response } from "express";
import { Error } from "sequelize";
import Attendance from "../models/Attendance";

class AttendanceController {
    static async show(_: Request, res: Response) {
        try {
            const attendances = await Attendance.findAll();
            return res.json(attendances);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }

    static async index(req: Request, res: Response) {
        try {
            const attendance = await Attendance.findByPk(req.params.id);
            return res.json(attendance);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }

    static async store(req: Request, res: Response) {
        try {
            const attendance = await Attendance.create(req.body);
            return res.json(attendance);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }

    static async update(req: Request, res: Response) {
        try {
            const attendance = await Attendance.findByPk(req.params.id);
            await attendance?.update(req.body);
            return res.json(attendance);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }

    static async destroy(req: Request, res: Response) {
        try {
            const attendance = await Attendance.findByPk(req.params.id);
            await attendance?.destroy();
            return res.json(attendance);
        } catch (error: Error | any) {
            return res.status(500).json({ error: error.message });
        }
    }
}

export default AttendanceController;
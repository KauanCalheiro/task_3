import { Router } from "express";
import AttendanceController from "../controllers/PresenceController";

const attendanceRouter = Router();

attendanceRouter.get('/', (req, res) => {
    AttendanceController.show(req, res)
});

attendanceRouter.get('/:id', (req, res) => {
    AttendanceController.index(req, res)
});

attendanceRouter.post('/', (req, res) => {
    AttendanceController.store(req, res)
});

attendanceRouter.put('/:id', (req, res) => {
    AttendanceController.update(req, res)
});

attendanceRouter.delete('/:id', (req, res) => {
    AttendanceController.destroy(req, res)
});

export default attendanceRouter;
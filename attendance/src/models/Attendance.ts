import { DataTypes, Model, Optional } from "sequelize";
import sequelizeConnection from "../database/Config";

interface AttendanceInterface {
    id: number;
    ref_inscription: number;
    dt_presence: Date;
}

export interface AttendanceInput extends Optional<AttendanceInterface, 'id'> {}
export interface AttendanceOutput extends Required<AttendanceInterface> {}

class Attendance extends Model<AttendanceInterface, AttendanceInput> implements AttendanceInterface {
    public id!: number;
    public ref_inscription!: number;
    public dt_presence!: Date;

    public readonly created_at!: Date;
    public readonly updated_at!: Date;
    public readonly deleted_at!: Date;
}

Attendance.init({
    id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true
    },
    ref_inscription: {
        type: DataTypes.INTEGER,
        allowNull: false
    },
    dt_presence: {
        type: DataTypes.DATE,
        allowNull: false,
        defaultValue: DataTypes.NOW
    }
}, {
    tableName: 'attendances',
    timestamps: true,
    createdAt: 'created_at',
    updatedAt: 'updated_at',
    deletedAt: 'deleted_at',
    sequelize: sequelizeConnection,
    paranoid: true
});

export default Attendance;

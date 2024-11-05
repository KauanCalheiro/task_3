import { DataTypes, Model, Optional } from "sequelize";
import sequelizeConnection from "../database/Config";

interface EventInterface {
    id: number;
    name: string;
    description?: string;
    dt_init: Date;
    dt_end: Date;
    location?: string;
    capacity: number;
}

export interface EventInput extends Optional<EventInterface, 'id'> {}
export interface EventOutput extends Required<EventInterface> {}

class Event extends Model<EventInterface, EventInput> implements EventInterface {
    public id!: number;
    public name!: string;
    public description!: string;
    public dt_init!: Date;
    public dt_end!: Date;
    public location!: string;
    public capacity!: number;

    public readonly created_at!: Date;
    public readonly updated_at!: Date;
    public readonly deleted_at!: Date;
}

Event.init({
    id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true
    },
    name: {
        type: DataTypes.STRING,
        allowNull: false
    },
    description: {
        type: DataTypes.STRING
    },
    dt_init: {
        type: DataTypes.DATE,
        allowNull: false
    },
    dt_end: {
        type: DataTypes.DATE,
        allowNull: false
    },
    location: {
        type: DataTypes.STRING
    },
    capacity: {
        type: DataTypes.INTEGER,
        allowNull: false
    }
}, {
    tableName: 'events',
    timestamps: true,
    createdAt: 'created_at',
    updatedAt: 'updated_at',
    deletedAt: 'deleted_at',
    sequelize: sequelizeConnection,
    paranoid: true
});

export default Event;


/*
{
  "name": "Evento de teste",
  "description": "Evento de teste",
  "dt_init": "2024-11-05",
  "dt_end": "2024-11-05",
  "location": "Local de teste",
  "capacity": 100
}

*/
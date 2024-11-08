import { Dialect, Sequelize } from 'sequelize'

const dbConnection = process.env.DB_CONNECTION as Dialect
const dbDatabase = process.env.DB_DATABASE as string
const dbUsername = process.env.DB_USERNAME as string
const dbPassword = process.env.DB_PASSWORD
const dbHost = process.env.DB_HOST
const dbPort = parseInt(process.env.DB_PORT as string)

const sequelizeConnection = new Sequelize(dbDatabase, dbUsername, dbPassword, {
  host: dbHost,
  dialect: dbConnection,
  port: dbPort,
})

export default sequelizeConnection